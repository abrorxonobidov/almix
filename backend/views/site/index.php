<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Almix.uz sayti admin paneli</h2>

        <p class="lead">___ ___ ___</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h3>Yangiliklar</h3>

                <p> 320 </p>

                <p>
                    <?=Html::a('Barchasi &raquo;', ['lists/index'], ['class' => 'btn btn-default'])?>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
