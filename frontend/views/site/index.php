<?php

/* @var $this yii\web\View */

$this->title = Yii::t('main', 'Bosh sahifa');
?>

<?= \frontend\widgets\SliderWidget::widget() ?>

<? //=\frontend\widgets\AdvantagesWidget::widget()?>

<?= \frontend\widgets\VideoWidget::widget() ?>

<?= \frontend\widgets\PhotoGalleryWidget::widget() ?>

<?= \frontend\widgets\NewsWidget::widget() ?>

<?= \frontend\widgets\MapWidget::widget() ?>

<?= \frontend\widgets\PrincipleWidget::widget() ?>

<!--<section class="block-soc-net">
    <div class="container h_width">
        <span class="title">
            <?/*= Yii::t('main', 'Ijtimoiy tarmoqlar') */?>
        </span>
        <ul>
            <li>
                <a href="https://t.me/almixuz" target="_blank">
                    <i class="fa fa-telegram"></i>
                </a>
            </li>
            <li>
                <a href="https://instagram.com/almixuz" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="https://facebook.com/almixuz" target="_blank">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </li>
        </ul>
    </div>
</section>-->

<?= \frontend\widgets\PartnerWidget::widget() ?>

