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
            'category_id',
            'title_uz',
            'title_ru',
            'title_en',
            'preview_uz',
            'preview_ru',
            'preview_en',
            'description_uz:ntext',
            'description_ru:ntext',
            'description_en:ntext',
            'preview_image',
            'gallery',
            'order',
        ],
    ]) ?>

</div>
