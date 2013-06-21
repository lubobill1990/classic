<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-19
 * Time: 下午4:39
 * To change this template use File | Settings | File Templates.
 */
class CaptchaController extends Controller
{
    public function actionIndex(){
        Yii::app()->captcha->createImage();
    }
}
