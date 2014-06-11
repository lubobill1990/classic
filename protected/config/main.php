<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
if (!function_exists('getBaseUrl')) {
    function getBaseUrl()
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            return 'http://' . @$_SERVER['HTTP_HOST'];
        } else {
            return "http://classic.lilystudio.org";
        }
    }
}
global $base_path, $www_path, $base_url;
$base_path = dirname(dirname(__FILE__));
$www_path = dirname($base_path);
$app_name = 'ClassIC - 看课';
$base_url = getBaseUrl();
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => $app_name,
    'homeUrl' => '/',
    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(

        'application.models.global.*',
        'application.models.classic.*',
        'application.models.service.*',
        'application.models.*',
        'application.forms.*',
        'application.components.*',
        'ext.giix-components.*', // giix components
        'application.helpers.*',

    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'pass',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '*'),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
                'ext.gtc' // a path alias
            ),
        ),
        'feedback',
        'admin',
    ),
    'aliases' => array(
        'views' => $base_path . '/views',
        'yiiext' => $base_path . '/extensions/yiiext',
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'application.components.WebUser',
            'loginUrl' => array('/signin'),
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'viewRenderer' => array(
            'class' => 'application.extensions.yiiext.renderers.smarty.ESmartyViewRenderer',
            'fileExtension' => '.tpl',
            'pluginsDir' => 'yiiext.renderers.smarty.plugins',
            'smartyDir' => 'application.vendor.smarty',
            //'configDir' => 'application.smartyConfig',
            //'prefilters' => array(array('MyClass','filterMethod')),
            //'postfilters' => array(),
            //'config'=>array(
            //    'force_compile' => YII_DEBUG,
            //   ... any Smarty object parameter
            //)
        ),
        'captcha' => array(
            'class' => 'ext.php-captcha.CPhpCaptcha',
            'session_var' => 'captcha',
        ),
        'mailer' => array(
            'class' => 'ext.SwiftMailer.CSwiftMailer',
            'email' => 'npeasy@163.com',
            'password' => 'npeasypass',
            'smtpServer' => 'smtp.163.com',
            'smtpPort' => 25,
            'fromName' => $app_name
        ),
        'dom' => array(
            'class' => 'ext.simple-html-dom.CSimpleHtmlDom'
        ),
        'request' => array(
            'baseUrl' => '',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
//            'urlSuffix'=>'.html',
            'showScriptName' => false,
            'rules' => array(
                'captcha' => "Captcha/index",

                'signup' => 'Account/signup',
                'login' => 'Account/signin',
                'signin' => 'Account/signin',
                'logout' => 'Account/signout',
                'signout' => 'Account/signout',
                'account/activate' => "Account/activate",

                'resend-activate-code' => "Account/resendActivateCode",
                'retrieve-password' => 'Account/retrievePassword',
                'reset-password' => 'Account/resetPassword',
                'account/block' => 'Account/block',
                'rts_authorize_url' => "RTS/authorize",
                'rts_get_user_id' => 'RTS/getUserId',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:\w+>' => '<module>/default/index',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>' => '<controller>/index',

            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=classic_dev',
            'emulatePrepare' => true,
            'username' => 'classic',
            'password' => 'classicpass',
            'charset' => 'utf8',
        ),
        'redis' => array(
            'class' => 'ext.YiiRedis.ARedisConnection',
            'hostname' => 'localhost',
            'port' => 6379,
        ),
//        'cache' => array(
//            'class' => 'system.caching.CMemCache',
//            'servers' => array(
//                array('host' => '127.0.0.1', 'port' => 11211),
//            ),
//        ),
        'htmlPurifier' => array(
            'class' => 'system.web.widgets.CHtmlPurifier'
        ),
        'fileUpload' => array(
            'class' => 'ext.jQueryFileUpload.JQueryFileUpload',
            'upload_dir' => realpath(dirname(__FILE__) . '/../../upload') . '/',
            'script_url' => '/fileUpload/create',
            'delete_url' => '/fileUpload/delete',
            'upload_url' => '/upload/',
            'mkdir_mode' => 0755,
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'sendEmail' => true,
        // this is used in contact page
        'adminEmail' => 'lubobill1990@163.com',
        'activateNeeded' => false,
        'useRedis' => false,
        'page_title' => array(
            'default' => 'ClassIC'
        ),
        'feedback' => array(
            'short_comment_content_length' => 60
        ),
        'image_versions' => array(
            // Uncomment the following version to restrict the size of
            // uploaded images:
            'large' => array(
                'max_width' => 1200,
                'max_height' => 900,
                'jpeg_quality' => 95
            ),
            // Uncomment the following to create medium sized images:
            'medium' => array(
                'max_width' => 400,
                'max_height' => 300,
                'jpeg_quality' => 80
            ),
            'thumbnail' => array(
                'max_width' => 120,
                'max_height' => 120
            )
        )
    ),
);
