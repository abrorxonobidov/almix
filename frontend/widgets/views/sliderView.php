<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:22
 */

use yii\bootstrap\Html;
use yii\widgets\ListView;

/**
 * @var  $dataProvider
 */

echo Html::beginTag('section', ['class' => 'block_second'])
    .
    ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}',
        'itemView' => function ($list) {
            return
                Html::tag('div', Html::img('@web/uploads/' . $list->preview_image), ['class' => 'slider_img'])
                .
                Html::tag('div', Html::a(Html::tag('span', $list->titleLang), '#', ['class' => 'description_in']), ['class' => 'description']);
        },
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'item'
        ],
        'options' => [
            'tag' => 'div',
            'id' => 'actual_news_slider',
            'class' => 'owl-carousel'
        ]
    ])
    .
    Html::endTag('section');