<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bolu
 * Date: 12-12-17
 * Time: AM11:08
 * To change this template use File | Settings | File Templates.
 */

class RedisActiveRecordBehavior extends CBehavior
{
    protected static $key_prefix=null;
    private function composeRedisKey($key)
    {
        $owner = $this->getOwner();

        if(empty(static::$key_prefix)){
            return "{$owner->tableName()}:{$owner->id}:$key";
        }else{
            return "{$owner->tableName()}:{$owner->id}:".static::$key_prefix.":$key";
        }
    }

    public function redisGetAttr($key)
    {
        return Common::getRedisClient()->get($this->composeRedisKey($key));
    }

    public function redisSetAttr($key, $val)
    {
        return Common::getRedisClient()->set($this->composeRedisKey($key),$val);
    }

    public function redisIncrAttr($key)
    {
        return Common::getRedisClient()->incr($this->composeRedisKey($key));
    }

    public function redisIncrAttrBy($key,$by)
    {
        return Common::getRedisClient()->incrBy($this->composeRedisKey($key),$by);
    }

    public function redisDelAttr($key){
        return Common::getRedisClient()->del($this->composeRedisKey($key));
    }
}