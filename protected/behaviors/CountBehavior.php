<?php

/**
 * 同时使用redis和mysql来保存count数据
 * 如果mysql拥有比redis更高的优先级，在改写count数据时，一定是先写mysql，再该redis，读取数据时先读redis，如果没有数据则读mysql
 * 如果redis拥有比mysql更高的优先级，在改写count数据是，只改动redis，同时向mysql每天同步一次数据
 *
 * 虽然redis是数据库，负责持久化操作，但是还将数据在mysql中保存一份拷贝的原因是方便数据迁移
 *
 * 要使用Count的subject，一定有个id为名称的主键
 * User: bolu
 * Date: 13-1-8
 * Time: PM3:43
 * To change this template use File | Settings | File Templates.
 */
Yii::import('application.behaviors.RedisActiveRecordBehavior');
class CountBehavior extends RedisActiveRecordBehavior
{
    protected $count = null;
    protected static $high_prio_db = 'mysql';
    protected static $key_prefix='count';

    protected function getSubjectInfo()
    {
        $owner = $this->getOwner();
        return array(
            'type' => $owner->tableName(),
            'id' => $owner->id
        );
    }

    /**
     * 首先从成员变量中找，如果没有则到redis找，如果还没有则到mysql中找，实在没有则返回null
     * @param $count_type
     * @return null
     */
    protected function getCount($count_type)
    {
        if ($this->count === null) {
            $count = $this->redisGetAttr($count_type);
            //如果redis中不存在，则到mysql中找
            if (empty($count)) {
                $subject_info = $this->getSubjectInfo();
                $count_obj = Count::model()->findByAttributes(
                    array(
                        'subject_type' => $subject_info['type'],
                        'subject_id' => $subject_info['id'],
                        'count_type' => $count_type));
                if (empty($count_obj)) {
                    return 0;
                }
                $count = $count_obj->count;
                $this->redisSetAttr($count_type,$count);
            }
            $this->count = $count;

        }
        return $this->count<0?$this->setCount($count_type,0):$this->count;
    }

    /**
     * 首先设置mysql数据 //如果mysql的优先级高
     * 其次设置redis数据
     * 最后设置成员变量
     * @param $count_type
     * @param $count
     */
    protected function setCount($count_type, $count)
    {
        $subject_info = $this->getSubjectInfo();
        if (static::$high_prio_db == 'mysql') {
            //update when exists
            $sql = 'INSERT INTO ' . Count::model()->tableName() . ' (`subject_type`,`subject_id`,`count_type`,`count`) VALUES (:subject_type,:subject_id,:count_type,:count) ON DUPLICATE KEY UPDATE `count`=:count;';
            $command = Yii::app()->db->createCommand($sql);
            $command->execute(array(
                'subject_type' => $subject_info['type'],
                'subject_id' => $subject_info['id'],
                'count_type' => $count_type,
                'count' => $count
            ));
        }
        $old_count=$this->redisGetAttr($count_type);

        $this->redisSetAttr($count_type, $count);
        $this->onCountUpdate($old_count,$this->count,$count_type);
        return $this->count = $count;
    }

    /**
     * 将mysql中的count数据同步到redis中（以mysql中的数据为准）
     * @param $count_type
     * @return null
     */
    protected function syncCount($count_type)
    {
        $subject_info = $this->getSubjectInfo();

        if(static::$high_prio_db=='mysql'){
            //如果mysql具有更高优先级，则将mysql的数据同步到redis中
            $count_obj = Count::model()->findByAttributes(
                array(
                    'subject_type' => $subject_info['type'],
                    'subject_id' => $subject_info['id'],
                    'count_type' => $count_type));
            if (empty($count_obj)) {
                return false;
            }
            $this->redisSetAttr($count_type, $count_obj->count);
            $this->count = $this->redisGetAttr($count_type);
        }else{
            //否则将redis的数据同步到mysql中
            $this->count=$this->redisGetAttr($count_type);
            $sql = 'INSERT INTO ' . Count::model()->tableName() . ' (`subject_type`,`subject_id`,`count_type`,`count`) VALUES (:subject_type,:subject_id,:count_type,:count) ON DUPLICATE KEY UPDATE `count`=:count;';
            $command = Yii::app()->db->createCommand($sql);
            $command->execute(array(
                'subject_type' => $subject_info['type'],
                'subject_id' => $subject_info['id'],
                'count_type' => $count_type,
                'count' => $this->count
            ));
        }

        return $this->count;
    }

    protected function incrCount($count_type, $count = 1)
    {
        $subject_info = $this->getSubjectInfo();
        if (static::$high_prio_db == 'mysql') {
            //对于大多数count，需要先保存一份mysql的备份，同时设置redis，这样保证了mysql数据的正确性，同时保证读取速度的提高
            //但对于如viewCount这样的count，mysql部分不需要每次都修改，可以把所有修改都放记录在redis中，同时每天同步一次数据，将redis中数据保存到数据库
            $sql = 'INSERT INTO ' . Count::model()->tableName() . ' (`subject_type`,`subject_id`,`count_type`,`count`) VALUES (:subject_type,:subject_id,:count_type,:count) ON DUPLICATE KEY UPDATE `count`=`count`+:count;';
            $command = Yii::app()->db->createCommand($sql);
            $command->execute(array(
                'subject_type' => $subject_info['type'],
                'subject_id' => $subject_info['id'],
                'count_type' => $count_type,
                'count' => $count
            ));
        }

        $this->count = $this->redisIncrAttrBy($count_type, $count);
        $this->onCountUpdate($this->count-$count,$this->count,$count_type);
        return $this->count;
    }

    protected function decrCount($count_type,$count=1)
    {
        $this->incrCount($count_type, -$count);
        return $this->count;
    }

    protected function onCountUpdate($old_count,$count,$count_type){
        if(empty($old_count)){
            $old_count=0;
        }
        $function='on'.ucfirst($count_type).'CountUpdate';
        $owner=$this->getOwner();
        if(method_exists($owner,$function)){
            $owner->$function(new CEvent($this,array('old_count'=>$old_count,'count'=>$count)));
        }
    }

    protected function delCount($count_type){
        $subject_info=$this->getSubjectInfo();
        Count::model()->deleteAll("subject_id=:subject_id AND subject_type=:subject_type AND count_type=:count_type",array(
            'subject_type'=>$subject_info['type'],
            'subject_id'=>$subject_info['id'],
            'count_type'=>$count_type
        ));
        return $this->redisDelAttr($count_type);
    }
}
