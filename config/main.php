<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
	'currencyCode' => 'RUR',
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
