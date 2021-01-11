<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use common\models\ListCategorySearch;

$this->title = 'Almix.uz sayti admin paneli';
?>
<div class="site-index">
    <div class="jumbotron">
        <h2><?= $this->title ?></h2>

        <p class="lead">___ ___ ___</p>
    </div>
    <div class="body-content">
        <div class="row">
            <? foreach (ListCategorySearch::getMainCats() as $category) { ?>
                <div class="col-lg-3">
                    <h3><?= $category->title_uz ?></h3>
                    <p> <?= count($category->lists) ?> </p>
                    <p> <?= Html::a('Barchasi &raquo;', ['lists/index', 'ListsSearch[category_id]' => $category->id], ['class' => 'btn btn-default']) ?> </p>
                </div>
            <? } ?>
            <? $category = ListCategorySearch::findOne(['id' => 8]) ?>
            <div class="col-lg-3">
                <h3><?= $category->title_uz ?></h3>
                <p> <?= count($category->lists) ?> </p>
                <p> <?= Html::a('Barchasi &raquo;', ['lists/index', 'ListsSearch[category_id]' => $category->id], ['class' => 'btn btn-default']) ?> </p>
            </div>
        </div>
    </div>
</div>
