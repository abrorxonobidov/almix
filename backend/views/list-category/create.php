<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListCategory */

$this->title = Yii::t('main', 'Create List Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'List Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
