<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ListsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lists-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Create Lists'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'title_uz',
            'title_ru',
            'title_en',
            //'preview_uz',
            //'preview_ru',
            //'preview_en',
            //'description_uz:ntext',
            //'description_ru:ntext',
            //'description_en:ntext',
            //'preview_image',
            //'gallery',
            //'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
