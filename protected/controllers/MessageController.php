<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-17
 * Time: 上午11:41
 * To change this template use File | Settings | File Templates.
 */
class MessageController extends Controller
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
                'actions' => array('friendList', 'conversation', 'userInfo', 'webIM', 'send'),
                'users' => array('@')
            ),
            array(
                'deny',
                'users' => array('*')
            )
        );
    }

    public function actionFriendList()
    {
        $sql = "SELECT u2.id, u2.username, u2.email FROM (SELECT * FROM user WHERE user.id=:user_id) AS u1 INNER JOIN following AS f1 ON u1.id=f1.user_id INNER JOIN user AS u2 ON f1.follow_user_id=u2.id INNER JOIN following AS f2 ON f2.user_id=u2.id AND f2.follow_user_id=u1.id";
        $sql="SELECT id,username,email FROM user WHERE id<>:user_id";
        $res = Yii::app()->db->createCommand($sql)->queryAll(true, array('user_id' => Yii::app()->user->user->id));
        foreach ($res as &$rec) {
            $rec['avatar_url'] = Common::getGravatar($rec['email']);
        }
        AjaxResponse::success($res);
    }

    public function actionUserInfo($user_id)
    {
        $sql = "SELECT id,username,email FROM user WHERE id=:user_id";
        $result = Yii::app()->db->createCommand($sql)->query(array(':user_id' => $user_id));
        $result = $result->read();
        $result['avatar_url'] = Common::getGravatar($result['email']);
        AjaxResponse::success($result);
    }

    public function actionConversation($from_user_id)
    {
        $sql = "SELECT *,create_time as timestamp FROM (( SELECT * FROM message AS m1 WHERE user_id=:user_id AND from_user_id=:from_user_id ORDER BY create_time DESC LIMIT 5 )" .
            " UNION (SELECT * FROM message AS m2 WHERE user_id=:user_id2 AND from_user_id=:from_user_id2 ORDER BY create_time DESC LIMIT 5 )) AS m3 ORDER BY create_time ASC";
        $result = Yii::app()->db->createCommand($sql)->queryAll(true, array(
            ':user_id' => Yii::app()->user->id,
            ':from_user_id' => $from_user_id,
            ':user_id2' => $from_user_id,
            ':from_user_id2' => Yii::app()->user->id
        ));
        AjaxResponse::success($result);
    }

    public function actionSend()
    {
        if (!array_key_exists('to_user_id', $_REQUEST) || !array_key_exists('content', $_REQUEST)) {
            AjaxResponse::missParam();
        }
        $_REQUEST['user_id'] = $_REQUEST['to_user_id'];
        $msg = new Message();
        $msg->attributes = $_REQUEST;
        $msg->from_user_id = Yii::app()->user->id;
        if ($msg->save()) {
            AjaxResponse::success($msg->create_time);
        }
        AjaxResponse::invalidParam();
    }

    public function actionWebIM()
    {
        AjaxResponse::success($this->smarty->fetchString('webim/index'));
    }

}
