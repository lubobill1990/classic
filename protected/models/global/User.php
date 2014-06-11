<?php

Yii::import('application.models.global._base.BaseUser');

class User extends BaseUser
{
    public $raw_password;
    private $password_changed = false;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function validatePassword($raw_password)
    {var_dump(CPasswordHelper::verifyPassword($raw_password, $this->password));

        return CPasswordHelper::verifyPassword($raw_password, $this->password);
    }

    /**
     * Generates the password hash.
     * @param string password
     * @return string hash
     */
    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

    public function changePassword($password)
    {
        $this->raw_password = $password;
        $this->password = $this->hashPassword($password);
        $this->password_changed = true;
    }

    public function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->raw_password = $this->password;
            $this->password = $this->hashPassword($this->password);
        }
        return true;
    }

    public function generateOperationKey($operation)
    {
        $key = Common::generateRandomString(60);
        $command = Yii::app()->db->createCommand("REPLACE INTO " . UserOperationKey::model()->tableName() . "(user_id,operation,`key`) values(:user_id ,:operation,:key)");
        $command->execute(array('user_id' => $this->id, 'operation' => $operation, 'key' => $key));
        return $key;
    }

    public function getOperationKey($operation)
    {
        return UserOperationKey::model()->findByAttributes(array('operation' => $operation, 'user_id' => $this->id));
    }

    public function getAvatarUrl($size = 100)
    {
        return Common::getGravatar($this->email, $size);
    }

    public function getUrl()
    {
        return '/u/' . $this->username;
    }

    public function hasPrivilege($privilege)
    {
        return false;
    }

    public function hasFollowCourse($course_id)
    {
        return FollowCourse::model()->exists("user_id=:u AND course_id=:c", array('u' => $this->id, 'c' => $course_id));
    }
}