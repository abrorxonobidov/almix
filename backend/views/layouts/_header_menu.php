<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 09.01.2021
 * Time: 20:21
 */


use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Html;
use common\models\ListCategorySearch;


NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
if (Yii::$app->user->isGuest) {
    $menuItems = [
        ['label' => 'Login', 'url' => ['site/login']]
    ];
} else {

    $menuItems = [
        ['label' => 'Asosiy', 'url' => ['site/index']],
    ];

    foreach (ListCategorySearch::getMainCats() as $category)
        $menuItems[] = [
            'label' => $category->title_uz,
            'url' => ['lists/index', 'ListsSearch[category_id]' => $category->id],
            'options' => [
                'class' => @Yii::$app->request->get('ListsSearch')['category_id'] == $category->id ? 'active' : ''
            ]
        ];

    $subItems = [];
    foreach (ListCategorySearch::getOtherCats() as $category)
        $subItems[] = [
            'label' => $category->title_uz,
            'url' => ['lists/index', 'ListsSearch[category_id]' => $category->id],
            'options' => [
                'class' => @Yii::$app->request->get('ListsSearch')['category_id'] == $category->id ? 'active' : ''
            ]
        ];
    $subItems[] = [
        'label' => 'Barcha roʻyxat',
        'url' => ['lists/index', 'all']
    ];

    $menuItems[] = [
        'label' => Html::icon('list'),
        'items' => $subItems,
        'encode' => false
    ];
    $menuItems[] = [
        'label' => 'Kategoriyalar',
        'url' => ['list-category/index']
    ];
    $menuItems[] = [
        'label' => 'Profil',
        'items' => [
            [
                'label' => 'Personal data',
                'url' => ['site/update']
            ],
            [
                'label' =>
                    Html::beginForm(['site/logout'], 'post')
                    . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-block btn-warning'])
                    . Html::endForm(),
                'encode' => false
            ]
        ],
    ];

}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
    'encodeLabels' => true
]);
NavBar::end();