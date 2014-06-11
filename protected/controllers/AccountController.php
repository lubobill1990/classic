<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bolu
 * Date: 12-11-10
 * Time: 下午3:04
 * To change this template use File | Settings | File Templates.
 */
class AccountController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('test', 'signup', 'signin', 'activate', 'resetPassword', 'retrievePassword', 'block', 'choose', 'resendActivateCode')
            ),
            array('allow',
                'actions' => array('index', 'view', 'signout'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

    public function actionTest()
    {
        var_dump(UserLoginLog::getRecentFailureLoginCount('lubo_nju@163.com'));
    }

    public function actionSignup()
    {
        $this->setPageTitle('注册');
        $user = new User();
        $error = array();
        if (Yii::app()->request->isPostRequest) {
            $user->attributes = $_POST['User'];

            if ($_REQUEST['captcha'] != Yii::app()->captcha->text()) {
                $error['captcha'] = 1;
            } else {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    if ($user->save()) {
                        $activate_code = $user->generateOperationKey('activate');
                        $transaction->commit();
                        ServiceEmail::send(
                            $user->email,
                            '账户完成注册，请激活',
                            $this->render('signup_email',
                                array('user' => $user, 'activate_code' => $activate_code),
                                true), true);
                        $login_form = new LoginForm;
                        $login_form->password = $user->raw_password;
                        $login_form->username = $user->username;
                        $login_form->login();
                        $this->render('signup_success', array('user' => $user));
                        Yii::app()->end();
                    } else {
                        throw new Exception("用户创建失败");
                    }
                } catch (Exception $e) {
                    $transaction->rollback();

                    if ($e->getCode() == 23000) {

                        if (preg_match("/key 'email'/", $e->getMessage())) {
                            $error['email'] = 1;
                        } elseif (preg_match("/key 'username'/", $e->getMessage())) {
                            $error['username'] = 1;
                        }
                    }
                }
            }
            $user->password = $_POST['User']['password'];
        }
        $this->render('signup', array(
            'user' => $user,
            'error' => $error));

    }

    public function actionSignin()
    {
        $this->setPageTitle('登录');
        $login_form = new LoginForm;
        $errors = array();
        $show_captcha = false;
        // don't return to temp url
        if (!$this->isReturnableUrl(Yii::app()->user->returnUrl)) {
            Yii::app()->user->returnUrl = "/";
        }
        // collect user input data
        if (Yii::app()->request->isPostRequest && $this->requireValues($_POST, 'LoginForm')) {
            $login_form->attributes = $_POST['LoginForm'];
            //查询这个用户名在一段时间内登陆错误的次数
            if (UserLoginLog::getRecentFailureLoginCount($login_form->username) > 3) {
                $show_captcha = true;
            }
            if (@$_SESSION['show_captcha'] && (@$_POST['captcha'] != Yii::app()->captcha->text())) {
                $errors['captcha'] = 1;
            } // validate user input and redirect to the previous page if valid
            elseif ($login_form->validate() && $login_form->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            } else {
                $errors['username'] = 1;
            }

            if ($show_captcha) {
                $_SESSION['show_captcha'] = true;
            } else {
                $_SESSION['show_captcha'] = false;
            }
        }

        // display the login form
        $this->render('signin', array(
            'model' => $login_form,
            'show_captcha' => $show_captcha,
            'errors' => $errors,
            'return_url' => isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '/'));
    }

    private function isReturnableUrl($return_url)
    {
        if (strpos($return_url, 'user_id') !== false && strpos($return_url, 'key') !== false) {
            return false;
        }
        if (strpos($return_url, "/signin") !== false || strpos($return_url, "/login") !== false) {
            return false;
        }
        if (strpos($return_url, Yii::app()->homeUrl) === false && strpos($return_url, '/') != 0) {
            return false;
        }
        return true;
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionSignout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionResendActivateCode()
    {
        $errors = array();
        try {
            if (Yii::app()->request->isPostRequest && $this->requireValues($_POST, 'captcha', 'email')) {
                if ($_REQUEST['captcha'] != Yii::app()->captcha->text()) {
                    $this->throwMessage('captcha', "验证码错误");
                }
                $user = User::model()->findByAttributes(array('email' => $_POST['email']));
                if (empty($user) || $user->activated == 'yes') {
                    $this->throwMessage('user', "该邮箱用户不存在或者已激活");
                }
                $activate_code = $user->generateOperationKey('activate');

                Yii::app()->mailer->send(
                    $user->email,
                    '账户完成注册，请激活',
                    $this->smarty->fetchString('signup_email',
                        array('user' => $user, 'activate_code' => $activate_code)));
                $this->render("activate_code_email_success");
                Yii::app()->end();
            }
        } catch (Exception $e) {
            $errors = $this->getThrownMessage();
        }

        $this->render('resend_activate_code', array(
            'errors' => $errors
        ));

    }

    public function actionActivate()
    {
        if (isset($_REQUEST['code']) && isset($_REQUEST['user_id'])) {
            $user = User::model()->findByPk($_REQUEST['user_id']);
            if (empty($user)) {
                $this->render('activate_fail', array('error' => '不存在该用户'));
            } else {
                if ($user->activated == 'yes') {
                    $this->render('activate_success', array('message' => '账户已激活'));
                } else {
                    $activate_code = $user->getOperationKey('activate');
                    if (!empty($activate_code)) {
                        if ($activate_code->key == $_REQUEST['code']) {
                            $user->activated = 'yes';
                            if ($user->save()) {
                                $activate_code->delete();
                                Yii::app()->mailer->send($user->email, "账户 $user->email 激活成功", $this->smarty->fetchString('activate_success_email', array('user' => $user)));
                                $this->render('activate_success', array('message' => '账户激活成功'));
                            }
                        } else {
                            $this->render('activate_fail', array('error' => '激活码错误，请确定您的激活链接正确'));
                        }
                    }
                }
            }
        } else {
            $this->render('activate_fail', array('error' => '不是有效的激活链接'));
        }
    }

    public function actionResetPassword()
    {
        if (isset($_REQUEST['user_id']) && isset($_REQUEST['key'])) {
            $user = User::model()->findByPk($_REQUEST['user_id']);

            if (empty($user)) {
                $this->render('reset_password_form_fail', array('message' => '不是一个合法的修改密码链接'));
            } else {
                $change_password_key = $user->getOperationKey('change_password');
                if (!empty($change_password_key)) {
                    if (Yii::app()->request->isPostRequest) {
                        if (isset($_REQUEST['password'])) {
                            $user->changePassword($_REQUEST['password']);
                            if ($user->save()) {
                                $block_key = $user->generateOperationKey('block');
                                $change_password_key->delete();
                                Yii::app()->mailer->send($user->email, '修改密码成功', $this->smarty->fetchString('reset_password_success_email', array('user' => $user, 'key' => $block_key)));
                                $this->render('reset_password_success', array('user' => $user));
                            } else {
                                $this->render('reset_password_form_fail', array('message' => '保存用户密码时出错'));
                            }
                        } else {
                            $this->render('reset_password_form_fail', array('message' => '没有指定用户密码'));
                        }
                    } else {
                        $this->render('reset_password_form', array('key' => $change_password_key));
                    }
                } else {
                    $this->render('reset_password_form_fail', array('message' => '未获得修改密码的合法权限或者连接过期'));
                }
            }

        } else {
            $this->render('reset_password_form_fail', array('message' => '未获得修改密码的权限'));
        }
    }

    public function actionRetrievePassword()
    {
        $error = array();
        $email = '';
        if (Yii::app()->request->isPostRequest && isset($_POST['email']) && isset($_POST['captcha'])) {
            $email = $_POST['email'];

            if ($_POST['captcha'] != Yii::app()->captcha->text()) {
                $error['captcha'] = '验证码输入错误';
            } else {
                $user = User::model()->find("email=:email", array('email' => $_POST['email'],));
                if (!empty($user)) {
                    $change_password_key = $user->generateOperationKey('change_password');

                    Yii::app()->mailer->send($user->email, '修改密码链接',
                        $this->smarty->fetchString('retrieve_password_email',
                            array(
                                'user' => $user,
                                'key' => $change_password_key
                            )));
                    $this->render('retrieve_password_success', array());
                    Yii::app()->end();
                } else {
                    $error['user'] = '用户不存在，请确认邮箱没有拼写错误';
                }
            }

        }
        $this->render('retrieve_password_form', array('error' => $error, 'email' => $email));

    }

    public function actionBlock($user_id, $key)
    {
        $user = User::model()->findByPk($user_id);
        if (!empty($user)) {
            $block_key = $user->getOperationKey('block');
            if (!empty($block_key) && $block_key->key == $key) {
                $user->blocked = 'yes';
                if ($user->save()) {
                    $block_key->delete();
                    $this->render('block_success', array('user' => $user));
                }
            } else {
                $this->render('block_fail', array('message' => '冻结账户的链接已过期或不可用'));
            }
        } else {
            $this->render('block_fail', array('message' => '冻结账户的链接已过期或不可用'));
        }
    }

    public function actionActivate1()
    {
        $this->render('activate');
    }

    public function actionChoose()
    {
        $this->render('choose');
    }

    public function actionIndex()
    {
        $this->render('index', array());
    }

    public function actionView($id)
    {
        $this->render('view', array('user' => User::model()->findByPk($id)));
    }
}
