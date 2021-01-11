<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lists */

$this->title = Yii::t('main', 'Hosil qilish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Roʻyxat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lists-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
