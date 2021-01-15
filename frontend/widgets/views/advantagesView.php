<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:25
 */

use yii\bootstrap\Html;
use yii\widgets\ListView;
use common\models\Lists;

/**
 * @var $dataProvider
 */
echo Html::beginTag('section', ['class' => 'block_third']);
echo Html::beginTag('div', ['class' => 'container h_width']);
echo Html::tag('span', Yii::t('main', 'Bizning korxonani tanlash uchun 8 ta asosiy sabab'), ['class' => 'title']);
echo
ListView::widget([
    'dataProvider' => $dataProvider,
    'layout' => '{items}',
    'itemView' => function (Lists $list) {
        return
            Html::tag('span', Html::img('@web/uploads/' . $list->preview_image), ['class' => 'round'])
            .
            Html::a($list->titleLang, '#');
    },
    'itemOptions' => [
        'tag' => 'li'
    ],
    'options' => [
        'tag' => 'ul',
        'class' => 'reasons_list'
    ]
]);
echo Html::endTag('div');
echo Html::endTag('section');
