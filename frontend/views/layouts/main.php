<?php

/**
 * @var $this \yii\web\View
 * @var $content string
 */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <section class="block_first">
        <button type="button" class="b_left_menu"><img src="/img/humburger.png" alt=""/></button>
        <ul class="lang">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">РУ<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">ЎЗ</a></li>
                    <li><a href="#">O`z</a></li>
                    <li><a href="#">Eng</a></li>
                </ul>
            </li>
        </ul>
        <div class="container h_width">
            <div class="header">
                <div class="head_menu">
                    <nav class="navbar">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse nopade" id="bs-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">Bosh sahifa<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Пункт 1</a></li>
                                        <li><a href="#">Пункт 2</a></li>
                                        <li><a href="#">Пункт 3</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="#">Media</a></li>
                                <li><a href="#">Kompaniya haqida</a></li>
                                <li><a href="#"><img src="/img/logo_almix.png" alt=""/></a></li>
                                <li><a href="#">Mahsulotlar</a></li>
                                <li><a href="#">Xizmatlar</a></li>
                                <li><a href="#">Bog‘lanish</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
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
            <a href="#" class="footer_logo"><img src="/img/footer_logo.png" alt=""/></a>
        </div>
    </section>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
