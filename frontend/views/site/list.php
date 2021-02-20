<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 15.01.2021
 * Time: 23:13
 */

use yii\widgets\ListView;

/**
 * @var $searchModel \backend\models\ListsSearch
 * @var $dataProvider \yii\data\ActiveDataProvider
 */
$this->title = @$searchModel->category->titleLang ?? Yii::t('main', 'Roʻyxat');
?>

<style>
    body {
        background-color: #3f3f3f;
    }
</style>

<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span><?= $this->title?></span>
        </div>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items} </div><div class="pagination_b text-center"><nav aria-label="Page navigation">{pager}</nav></div>',
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
                'class' => 'flex-row row hasMargin hasMargin_inner'
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-4 col-md-4 col-sm-6 news_box'
            ],
            'emptyText' => '<p>'. Yii::t('main', 'Ma’lumot topilmadi') . '</p>',
            'emptyTextOptions' => [
                'class' => 'news_full_content text-center',
                'style' => 'width:100%'
            ]
        ]) ?>


    </div>
</section>