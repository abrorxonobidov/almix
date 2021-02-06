<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $message;
?>
<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span><?= Html::encode($this->title) ?></span>
        </div>
        <div class="site-error">

            <span>
                <?= nl2br(Html::encode($name)) ?>
            </span>

        </div>


    </div>
</section>
