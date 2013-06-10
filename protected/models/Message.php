<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property string $id
 * @property string $from_user_id
 * @property string $user_id
 * @property string $create_time
 * @property string $has_read
 * @property string $content
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_user_id, user_id', 'required'),
			array('from_user_id, user_id', 'length', 'max'=>11),
			array('has_read', 'length', 'max'=>3),
			array('content', 'length', 'max'=>255),
            array('content','length','min'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, from_user_id, user_id, create_time, has_read, content', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'from_user_id' => 'From User',
			'user_id' => 'User',
			'create_time' => 'Create Time',
			'has_read' => 'Has Read',
			'content' => 'Content',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('from_user_id',$this->from_user_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('has_read',$this->has_read,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function afterSave()
    {
        parent::afterSave();
        if ($this->isNewRecord) {
            //$user = new User();
            //$user->id = $this->user_id;
            //$user->incrMessageCount();
            $this->refresh();
            $unix_timestamp = time();
            //在此设置双方的最近联系人
            //Common::getRedisClient()->zAdd("message:{$this->from_user_id}:recent", $unix_timestamp, $this->user_id);
            //Common::getRedisClient()->zAdd("message:{$this->user_id}:recent", $unix_timestamp, $this->from_user_id);
            RTSMessenger::sendMessage($this->from_user_id, $this->user_id, $this->content, $this->create_time);
        }
    }
}