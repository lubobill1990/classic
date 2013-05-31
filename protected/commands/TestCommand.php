<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 勃
 * Date: 13-5-15
 * Time: 下午11:14
 * To change this template use File | Settings | File Templates.
 */
class TestCommand extends CConsoleCommand
{
    public function actionTest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        echo $res;
    }
}
