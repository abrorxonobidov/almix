<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/**
 * @var $this yii\web\View
 * @var $model common\models\Lists
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Roʻyxat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="lists-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Tahrirlash'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('main', 'Oʻchirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('main', 'Siz rostdan ham ushbu elementni o`chirmoqchimisiz?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a($model->category->titleLang, ['index', 'ListsSearch[category_id]' => $model->category_id], ['class' => 'btn btn-default']) ?>
        <?= Html::a(Html::icon('plus'), ['create', 'cat_id' => $model->category_id], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category.titleLang',
            'title_uz',
            'title_ru',
            'title_en',
            'preview_uz',
            'preview_ru',
            'preview_en',
            'description_uz:raw',
            'description_ru:raw',
            'description_en:raw',
            [
                'attribute' => 'preview_image',
                'value' => Html::img($model::imageSourcePath() . $model->preview_image, ['class' => 'col-md-4'])
                    . ' ' . Html::tag('p', $model->preview_image),
                'format' => 'raw'
            ],
            [
                'attribute' => 'inner_image',
                'value' => Html::img($model::imageSourcePath() . $model->inner_image, ['class' => 'col-md-4'])
                    . ' ' . Html::tag('p', $model->inner_image),
                'format' => 'raw'
            ],
            'order',
            [
                'label' => Yii::t('main', 'Galeriya'),
                'format' => 'html',
                'value' => function ($model) {
                    /** @var $model \common\models\Lists */
                    if (!$model->gallery) {
                        return '';
                    }
                    $images = glob($model::uploadImagePath() . $model->gallery . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);
                    $gallery = [];
                    foreach ($images as $image) {
                        $filePath = explode('/', $image);
                        $fileName = end($filePath);
                        $gallery[] = Html::img($model::imageSourcePath() . $model->gallery . '/' . $fileName, ['style' => 'height:150px;']);
                    }
                    return implode(' ', $gallery) . Html::tag('br') . $model->gallery;
                }
            ],
            'created.date',
            'created.user.full_name',
            'updated.date',
            'updated.user.full_name',
            'statusIconAndTitle:raw',
        ],
    ]) ?>

</div>
