<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'uz',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'almix-frontend',
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
        'urlManager' => [
            'class' => \codemix\localeurls\UrlManager::class,
            'enableDefaultLanguageUrlCode' => true,
            'enableLanguagePersistence' => false,
            'languages' => ['uz', 'ru'/*, 'en'*/],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableLanguageDetection' => false,
            'rules' => [
                '' => '/site/index',
                'l/<id:\d+>' => 'site/list',
                'g/<id:\d+>' => 'site/gallery',
                'v/<id:\d+>' => 'site/view',
                'r/<id:\d+>' => 'site/region',
                'p/<id:\d+>' => 'site/partner',
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>'
            ]
        ]
    ],
    'params' => $params,
];
