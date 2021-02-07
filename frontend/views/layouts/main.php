<?php

/**
 * @var $this \yii\web\View
 * @var $content string
 */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<? $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <? $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <? $this->head() ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<? $this->beginBody() ?>

<div class="wrapper">
    <div class="content">
    <section class="block_first">
        <button type="button" class="b_left_menu"><!--<img src="/img/humburger.png" alt=""/>--></button>
        <?= \frontend\widgets\LangSwitcherWidget::widget() ?>
        <?= \frontend\widgets\MenuWidget::widget() ?>
    </section>

    <?= $content ?>

    <section class="block_tenth">
        <div class="container h_width">
            <?//= \frontend\widgets\FooterMenuWidgets::widget()?>
            <a href="<?= Url::to(['site/index']) ?>" class="footer_logo"><img src="/img/footer_logo.png" alt=""/></a>
            <p class="year_text">© <?= date('Y') ?></p>
        </div>
    </section>


    </div>
</div>

<? $this->endBody() ?>
</body>
</html>
<? $this->endPage() ?>
