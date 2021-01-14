<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/**
 * @var $this yii\web\View
 * @var $model common\models\ListCategory
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Kategoriyalar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="list-category-view">

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
        <?= Html::a(Html::icon('plus'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'title_uz',
            'title_ru',
            'title_en',
            'image',
            'type_id',
            'created.date',
            'created.user.full_name',
            'updated.date',
            'updated.user.full_name',
            'statusIconAndTitle:raw'
        ],
    ]) ?>

</div>
