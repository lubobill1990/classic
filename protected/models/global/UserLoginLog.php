<?php

Yii::import('application.models.global._base.BaseUserLoginLog');

class UserLoginLog extends BaseUserLoginLog
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getRecentFailureLoginCount($login_id)
    {
        $table_name = self::model()->tableName();
        $res = Yii::app()->db->createCommand("
        SELECT count(*) AS count FROM {$table_name} WHERE user_login_id=:login_id AND timestamp>:timestamp AND success='no'")
            ->query(array(
                    'login_id' => $login_id,
                    'timestamp' => strftime("%Y-%m-%d %H:%M:%S", time() - 30))
            )->read();
        return $res['count'];

    }

    public function afterConstruct()
    {
        $this->ip = Common::getClientIp();
    }
}