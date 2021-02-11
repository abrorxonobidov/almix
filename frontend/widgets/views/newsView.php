<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:34
 */


use yii\widgets\ListView;
use yii\helpers\Html;

/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 */
?>

<section class="block_sixth">
    <div class="container h_width">
        <span class="title_other"><?= Yii::t('main', 'So‘ngi yangiliklar') ?></span>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'itemView' => function ($list, $key, $index, $widget) {
                return
                    /** @var  \yii\web\View $this */
                    $this->render('_list_item', [
                        'list' => $list,
                        'key' => $key,
                        'index' => $index,
                        'widget' => $widget
                    ]);
            },
            'options' => [
                'tag' => 'div',
                'class' => 'flex-row row hasMargin'
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-4 col-md-4 col-sm-6 news_box'
            ]
        ]); ?>
        <?= Html::a(Yii::t('main', 'Barcha yangiliklar'), ['site/list', 'id' => 2], ['class' => 'news_all_link']) ?>
    </div>
</section>
