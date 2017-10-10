<?php

$params = require(__DIR__ . '/params.php');




// mine //  Not  working  at  all!!!!!
//$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());
// change  path Url



$config = [
    'id' => 'basic',
    'defaultRoute' => 'support-data/index',  //  Mine  default  route -Controller/Action
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [


        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation  //  we put  a  secret   key  here in  first place ,won't  work  without  that  key  
            'cookieValidationKey' => 'dima',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,  // was  true
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
        
          //Pretty  URLs-----------
        /*
        'urlManager' => [
            'class' => 'yii\web\UrlManager', // added
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [       '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>'   ,//added
            ],
        ],
         */
           //END  Pretty  URLs------




    ],
    'params' => $params,
    'language' => 'en-EN', //  Mine  Edit   //was   en-US
];




if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

//mine  debagger
$config['modules']['debug']['allowedIPs'] = ['*'];
//
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
