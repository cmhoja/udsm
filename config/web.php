<?php

$params = require(__DIR__ . '/params.php');
$url_manager = require(__DIR__ . '/url_manager.php');
$config = [
    'id' => 'basic',
    'language' => 'en', //default language of the application
    'name' => ['en' => 'University of Dar es salaam', 'sw' => 'Chuo Kikuu cha Dar es salaam'],
    // 'name' => ['en' => '', 'sw' => ''],
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log','LanguageSelector'
    ],
    'components' => [
        'LanguageSelector' => [
            'class' => 'app\components\LanguageSelector'
        ],
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/udsm',
                'baseUrl' => '@web/themes/udsm',
                'pathMap' => ['@app/views' => 'themes/udsm'],
            ],
        ],
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                '*'
            ],
        ],
        'request' => [
            'enableCsrfValidation' => true,
            'enableCookieValidation'=>TRUE,
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5uagjTNYGcLvmOUl1QV9iFCZE8F',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => true,
            'authTimeout' => 300,
            'loginUrl' => ['backend/login'],
        ],
//        'authManager' => [
//            'class' => 'yii\rbac\DbManager',
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure a transport
// for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => $url_manager,
    ],
    'modules' =>
    [
        'gridview' =>
        [
            'class' => 'kartik\grid\Module',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                   // 'class' => 'mdm\admin\controllers\AssignmentController',
                  //  'userClassName' => 'app\models\User',
                 ///  'idField' => 'id',
//                    'userClassName' => 'app\models\Users',
//                    'idField' => 'Id'
                ]
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
                'route' => [
                    'en/site' => 'site/index',
//                    '*' => 'en/site'
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
