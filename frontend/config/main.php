<?php
/*$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);*/
$params = require(__DIR__ . '/params.php');

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [
          'class' => '\kartik\grid\Module', //
        ],
        'redactor' => 'yii\redactor\RedactorModule',
        'class' => 'yii\redactor\RedactorModule',
        'uploadDir' => '@webroot/uploads',
        'uploadUrl' => '/hello/uploads',
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation' => false, //false loginโดยไม่ต้องconfirm
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
    ],
    'controllerNamespace' => 'frontend\controllers',
    'language'=>'th', //ใช้งานภาษาไทย
    'components' => [
        /*'convert' => [
            'class' => 'app\components\models',
        ],*/
        'formatter' => [
            'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '674374761157-1akvjqkrjqaqsun3qats2uf60251bq3s.apps.googleusercontent.com',
                    'clientSecret' => 'p02eY5xsVNpgIMkzsK7V2kQO',
                ],
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => '272806369813003',
                    'clientSecret' => 'b05e3263a5325178ae3517bfab79c760',
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        /*'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                   '<controller:\w+>/<id:\d+>' => '<controller>/view',
                   '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                   '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                   ['class' => 'yii\rest\UrlRule', 'controller' => 'location', 'except' => ['delete','GET', 'HEAD','POST','OPTIONS'], 'pluralize'=>false],
                   '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],*/
        
    ],
    'params' => $params,
];
