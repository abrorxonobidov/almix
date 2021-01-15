<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:32
 */


use yii\widgets\ListView;
use yii\bootstrap\Html;
use common\models\Lists;

/**
 * @var $list \common\models\Lists
 * @var $dataProvider \yii\data\ActiveDataProvider
 */
?>

<section class="block_ninth">
    <div class="container h_width">
        <?= Html::tag('span', 'Hamkorlar', ['class' => 'title']) ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'itemView' => function (Lists $list) {
                return
                    Html::a(Html::img('@web/uploads/' . $list->preview_image) . $list->titleLang, '#');
            },
            'options' => [
                'tag' => 'ul',
                'class' => 'sponsor_list'
            ],
            'itemOptions' => [
                'tag' => 'li'
            ]
        ]) ?>
    </div>
</section>
