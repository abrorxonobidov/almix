<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 13.01.2021
 * Time: 17:43
 */

use yii\helpers\Url;
?>
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
                        <li class="active"><a href="<?= Url::to(['site/index'])?>"><?=Yii::t('main', 'Bosh sahifa')?></a></li>
                        <li><a href="<?= Url::to(['site/products'])?>"><?=Yii::t('main', 'Mahsulotlar')?></a></li>
                        <li><a href="<?= Url::to(['site/services'])?>"><?=Yii::t('main', 'Xizmatlar')?></a></li>
                        <li><a href="<?= Url::to(['site/index'])?>"><img src="/img/logo_almix.png" alt=""/></a></li>
                        <li><a href="<?= Url::to(['site/media'])?>"><?=Yii::t('main', 'Media')?></a></li>
                        <li><a href="<?= Url::to(['site/about'])?>"><?=Yii::t('main', 'Kompaniya haqida')?></a></li>
                        <li><a href="<?= Url::to(['site/contacts'])?>"><?=Yii::t('main', 'Bog‘lanish')?></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
