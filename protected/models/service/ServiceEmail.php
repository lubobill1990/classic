<?php

Yii::import('application.models.service._base.BaseServiceEmail');

class ServiceEmail extends BaseServiceEmail
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function send($to, $subject = null, $body = null, $async_mail = false)
    {
        if (isset(Yii::app()->params['sendEmail']) && Yii::app()->params['sendEmail'] === false) {
            return;
        }
        $email = new ServiceEmail();
        $email->attributes = array(
            'to' => $to,
            'category' => 'async',
            'from' => Yii::app()->mailer->email,
            'subject' => $subject,
            'body' => $body,
            'has_been_sent' => 'no'
        );
        if (!$async_mail) {
            Yii::app()->mailer->send(
                $email->to,
                $email->subject,
                $email->body
            );
            $email->category = 'sync';
            $email->has_been_sent = 'yes';
        }

        $email->save();
    }

    public static function getMailLoginPage($email, &$mail_name = null)
    {
        $email_links = array(
            array('ending' => '@qq.com', 'name' => 'QQ邮箱', 'url' => 'http://mail.qq.com/'),
            array('ending' => '@163.com', 'name' => '163邮箱', 'url' => 'http://mail.163.com/'),
            array('ending' => '@gmail.com', 'name' => 'Gmail邮箱', 'url' => 'http://mail.google.com'),
            array('ending' => '@sina.com', 'name' => '新浪邮箱', 'url' => 'http://mail.sina.com.cn/'),
            array('ending' => '@vip.sina.com', 'name' => '新浪VIP邮箱', 'url' => 'http://vip.sina.com.cn/'),
            array('ending' => '@126.com', 'name' => '126邮箱', 'url' => 'http://mail.126.com/'),
            array('ending' => '@sina.cn', 'name' => '新浪邮箱', 'url' => 'http://mail.sina.com.cn/'),
            array('ending' => '@hotmail.com', 'name' => 'Hotmail邮箱', 'url' => 'http://www.hotmail.com/'),
            array('ending' => '@sohu.com', 'name' => '搜狐邮箱', 'url' => 'http://login.mail.sohu.com/'),
            array('ending' => '@139.com', 'name' => '139邮箱', 'url' => 'http://mail.139.com/'),
            array('ending' => '@live.cn', 'name' => 'LIVE邮箱', 'url' => 'http://live.cn/'),
            array('ending' => '@21cn.com', 'name' => '21cn邮箱', 'url' => 'http://mail.21cn.com/'),
            array('ending' => '@wo.com.cn', 'name' => 'WO邮箱', 'url' => 'http://mail.wo.com.cn/'),
            array('ending' => '@189.cn', 'name' => '189邮箱', 'url' => 'http://mail.189.cn/')
        );
        foreach ($email_links as $link) {
            if (Common::endsWith($email, $link['ending'])) {
                $mail_name = $link['name'];
                return $link['url'];
            }
        }
        return null;
    }
}