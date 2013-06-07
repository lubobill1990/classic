<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'client of real-time server',
    'homeUrl' => '/',
    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'pass',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '*'),
        ),
        'feedback'
    ),

    // application components
    'components' => array(
        'user' => array(
            'class' => 'application.components.WebUser',
            'loginUrl' => array('/login'),
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'smarty' => array(
            'class' => 'ext.Smarty.CSmarty',
            'templateDirs' => array(
                'ext.feedback' => 'ext.feedback.templates',
            ),
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
            'fromName' => "Real-time Server"
        ),
        'request' => array(
            'baseUrl' => '',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'captcha' => "Captcha/index",
                'signup' => 'User/signup',
                'login' => 'User/login',
                'logout' => 'User/logout',
                'account/activate' => "User/activate",
                'account/retrieve_password' => 'User/retrievePassword',
                'account/reset_password' => 'User/resetPassword',
                'account/block' => 'User/block',
                'rts_authorize_url' => "RTS/authorize",
                'rts_get_user_id' => 'RTS/getUserId',

                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>' => '<module>/<controller>/index',
                '<module:\w+>' => '<module>/default/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>' => '<controller>/index',

            ),
        ),

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=devclassic',
            'emulatePrepare' => true,
            'username' => 'lldev',
            'password' => 'lilystudio',
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
        // this is used in contact page
        'adminEmail' => 'lubobill1990@163.com',
        'useRedis' => false,
        'page_title' => array(
            'default' => 'RTS-Client'
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