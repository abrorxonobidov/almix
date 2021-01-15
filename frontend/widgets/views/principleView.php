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

<section class="block_eight">
    <div class="container h_width">
        <?= Html::tag('span', 'Bizning prinsiplarimiz', ['class' => 'title']) ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'itemView' => function (Lists $list) {
                return
                    Html::a(Html::img('@web/img/tick.png') . $list->titleLang, '#');
            },
            'options' => [
                'tag' => 'ul',
                'class' => 'principles_lists'
            ],
            'itemOptions' => [
                'tag' => 'li',
                'class' => 'col-lg-4'
            ]
        ]) ?>
    </div>
</section>

