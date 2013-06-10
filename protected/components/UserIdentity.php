<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $user_id;

    public function getId()
    {
        return $this->user_id;
    }

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user = User::model()->find('email=:email or username=:username', array(':username' => $this->username, ':email' => $this->username));

        if ($user === NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
            $login_log = new LoginLog();
            $login_log->attributes = array('user_login_id' => $this->username, 'ip' => Common::getClientIp(), 'is_real_user' => 'no', 'success' => 'no');
            $login_log->save();
        } else {
            $this->user_id = $user->id;

            if ($user->authorizePassword($this->password)) {
                $this->errorCode = self::ERROR_NONE;
                $login_log=new LoginLog();
                $login_log->attributes = array('user_login_id' =>$this->username, 'ip' => Common::getClientIp(), 'is_real_user' => 'yes', 'success' => 'yes');
                $login_log->save();
            } else {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
                $login_log = new LoginLog();
                $login_log->attributes = array('user_login_id' => $this->username, 'ip' => Common::getClientIp(), 'is_real_user' => 'yes', 'success' => 'no');
                $login_log->save();
            }
        }
        return !$this->errorCode;
    }

}
