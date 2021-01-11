<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\ListCategory;
use common\models\Lists;

/**
 * @var $this yii\web\View
 * @var $searchModel \backend\models\ListsSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = $searchModel->category->title_uz ?? Yii::t('main', 'Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lists-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Create Lists'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'value' => 'category.title_uz',
                'filter' => ArrayHelper::map(
                    ListCategory::findAll(['status' => 1]),
                    'id',
                    'title_uz'
                )
            ],
            [
                'attribute' => 'title_uz',
                'value' => function (Lists $list) {
                    return
                        'Uz: ' . $list->title_uz . '<br>' .
                        'Ru: ' . $list->title_ru . '<br>' .
                        'En: ' . $list->title_en;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'preview_uz',
                'value' => function (Lists $list) {
                    return
                        'Uz: ' . $list->preview_uz . '<br>' .
                        'Ru: ' . $list->preview_ru . '<br>' .
                        'En: ' . $list->preview_en;
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'preview_image',
                'value' => function (Lists $list) {
                    return $list->preview_image ? Html::img('@frontend/web/uploads/' . $list->preview_image) : '';
                },
                'format' => 'raw'
            ],
            'order',
            [
                'attribute' => 'status',
                'value' => 'statusIconAndTitle',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'col-md-1'
                ],
                'filter' => $searchModel->getStatusListKeyAndTitle()
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Html::a(
                    Html::icon('refresh'),
                    [Yii::$app->controller->route],
                    ['title' => Yii::t('main', 'Очистить фильтр')]
                )
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>