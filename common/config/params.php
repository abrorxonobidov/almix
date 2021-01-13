<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
    'languages' => [
        'uz' => 'Oʻzbek',
        'ru' => 'Русский',
        'en' => 'English'
    ],
    'languagesShort' => [
        'uz' => 'Oʻz',
        'ru' => 'Ру',
        'en' => 'En'
    ],
    'cacheDurationMax' => 1800, //seconds = 30 minute
    'cacheDurationNormal' => 300, //seconds = 5 minute
    'cacheDurationMin' => 60, //seconds = 1 minute
    'imageUploadPath' => Yii::getAlias('@frontend') . '/web/uploads/',
];
