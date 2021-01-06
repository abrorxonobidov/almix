<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lists */

$this->title = Yii::t('main', 'Update Lists: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
?>
<div class="lists-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
