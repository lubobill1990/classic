<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-16
 * Time: 下午7:47
 * To change this template use File | Settings | File Templates.
 */
class RTSController extends Controller
{
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('getUserId'),
                'users'=>array('*')
            ),
            array('allow',
                'actions' => array('authorize'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function filters()
    {
        return array(
            'accessControl'
        );
    }

    public function actionAuthorize($conn_id, $rts_receive_auth_code_url)
    {
        $auth_code = new AuthCode();
        $auth_code->attributes = array(
            'user_id' => Yii::app()->user->user->id,
            'code' => Common::generateRandomString(40)
        );
        if($auth_code->save()){
            $this->redirect($rts_receive_auth_code_url . "?conn_id={$conn_id}&auth_code={$auth_code->code}&get_user_info_url=http://npeasy.com:3001/rts_get_user_id");
        }else{
            var_dump($auth_code->errors);
        }
    }

    public function actionGetUserId($auth_code)
    {
        $auth_code = AuthCode::model()->findByPk($auth_code);
        if (!empty($auth_code)) {
            echo CJSON::encode(array('user_id' => $auth_code->user_id));
        }
    }
}
