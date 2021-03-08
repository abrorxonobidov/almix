<?php

/**
 * @var $this \yii\web\View
 * @var $content string
 */

use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
$this->title = Yii::t('main', 'Texnik ishlar olib borilmoqda')
?>
<? $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <? $this->registerCsrfMetaTags() ?>
    <title><?=$this->title?></title>
    <? $this->head() ?>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<? $this->beginBody() ?>

<?= \frontend\widgets\SocialNetworksWidget::widget() ?>

<div class="wrapper">
    <div class="content">
        <div id="headMenu"></div>
        <section class="block_sixth block_sixth_in">
            <div class="container">
                <div class="text-center">
                    <br><br><br>
                    <h2 class="title"><?=$this->title?></h2>
                    <br>
                    <i class="glyphicon glyphicon-cog red"></i>
                    <br>
                    <i class="glyphicon glyphicon-cog rotating-right"></i>
                    <i class="glyphicon glyphicon-cog rotating-left"></i>
                </div>
            </div>
        </section>
        <section class="block_tenth">
            <div class="container h_width">
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


<style>
    @keyframes rotating-right {
        from {transform: rotate(0deg);}
        to {transform: rotate(360deg);}
    }
    .rotating-right {
        animation: rotating-right 4s linear infinite;
        color: #167e39;
        font-size: 101px;
    }
    @keyframes rotating-left {
        from {transform: rotate(22.5deg);}
        to {transform: rotate(-337.5deg);}
    }
    .rotating-left {
        animation: rotating-left 4s linear infinite;
        color: #167e39;
        font-size: 100px;
    }
    @keyframes rotating-red {
        from {transform: rotate(0deg);}
        to {transform: rotate(15deg);}
    }
    .red {
        animation: rotating-red 1s ease-in infinite;
        color: #d4584f;
        font-size: 150px;
    }
</style>
