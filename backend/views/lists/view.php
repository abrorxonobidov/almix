<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Lists */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lists-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
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
            'description_uz:html',
            'description_ru:html',
            'description_en:html',
            [
                'attribute' => 'preview_image',
                'value' => $model->preview_image ? Html::img('@frontend/web/uploads/' . $model->preview_image) : '',
                'format' => 'raw'
            ],
            'order',
            'gallery',
            'created.date',
            'created.user.full_name',
            'updated.date',
            'updated.user.full_name',
            'statusIconAndTitle:raw',
        ],
    ]) ?>

</div>
