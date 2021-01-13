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
</head>
<body>
<? $this->beginBody() ?>

<div class="wrapper">
    <section class="block_first">
        <button type="button" class="b_left_menu"><img src="/img/humburger.png" alt=""/></button>
        <?= \frontend\widgets\LangSwitcherWidget::widget() ?>
        <?= \frontend\widgets\MenuWidget::widget() ?>
    </section>

    <?= $content ?>

    <section class="block_tenth">
        <div class="container h_width">
            <div class="footer_list">
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="grid-item">
                        <div class="grid_title">Bosh sahifa</div>
                        <ul>
                            <li><a href="#">Logo va Almix Group</a></li>
                            <li><a href="#">Slogan</a></li>
                            <li><a href="#">Kontakt ma’lumotlari</a></li>
                            <li><a href="#">Afzalliklarimiz</a></li>
                            <li><a href="#">Ayrim mahsulot va xizmatlar</a></li>
                            <li><a href="#">Reklama videosi</a></li>
                            <li><a href="#">Galereya anons</a></li>
                        </ul>
                    </div>
                    <div class="grid-item">
                        <div class="grid_title">Media</div>
                        <ul>
                            <li><a href="#">Yangiliklar</a></li>
                            <li><a href="#">Galereya (Foto, video)</a></li>
                        </ul>
                    </div>
                    <div class="grid-item">
                        <div class="grid_title">Mahsulotlar va xizmatlar</div>
                        <ul>
                            <li><a href="#">Alyumin profil zavodi</a></li>
                            <li><a href="#">Alyumin profillar va aksessuarlar</a></li>
                            <li><a href="#">Plastik profillar va aksessuarlar</a></li>
                            <li><a href="#">Qum va qayta ishlangan tosh (drabilka)</a></li>
                            <li><a href="#">Shlakablok</a></li>
                            <li><a href="#">Penablok</a></li>
                            <li><a href="#">Oyna</a></li>
                            <li><a href="#">Mexmonxona (Almix Grand Hotel Ohangaron shaxrida qurilmoqda)</a></li>
                            <li><a href="#">Turar joy majmuasi (Almix Residence Toshkent shaxrida qurilmoqda)</a></li>
                            <li><a href="#">Co-working center (Biznes treyning markazi)</a></li>
                            <li><a href="#">Maxsus texnikaq</a></li>
                            <li><a href="#">Temirga ishlov berish</a></li>
                        </ul>
                    </div>
                    <div class="grid-item">
                        <div class="grid_title">Kompaniya haqida</div>
                        <ul>
                            <li><a href="#">Raxbariyat</a></li>
                            <li><a href="#">Hamkorlar</a></li>
                            <li><a href="#">Mukofot va Sertifikatlar</a></li>
                            <li><a href="#">Afzalliklarimiz (8 ta. Katalogda bor)</a></li>
                            <li><a href="#">Виртуальная приёмная</a></li>
                            <li><a href="#">Обращения через единый портал</a></li>
                        </ul>
                    </div>
                    <div class="grid-item">
                        <div class="grid_title">Kontaktlar</div>
                        <ul>
                            <li><a href="#">Bosh ofis</a></li>
                            <li><a href="#">Filiallar (10+ ta)</a></li>
                            <li><a href="#">Feedback</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="<?= Url::to(['site/index']) ?>" class="footer_logo"><img src="/img/footer_logo.png" alt=""/></a>
        </div>
    </section>


</div>

<? $this->endBody() ?>
</body>
</html>
<? $this->endPage() ?>
