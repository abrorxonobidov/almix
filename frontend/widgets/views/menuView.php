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
        <a href="#" class="header_mobile_logo"><img src="/img/logo_almix.png" alt="" /></a>
        <div class="head_menu" id="headMenu">
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
<!--                        <li class="active"><a href="--><?//= Url::to(['site/index'])?><!--">--><?//=Yii::t('main', 'Bosh sahifa')?><!--</a></li>-->
<!--                        <li><a href="--><?//= Url::to(['site/list', 'id' => 5])?><!--">--><?//=Yii::t('main', 'Mahsulotlar')?><!--</a></li>-->
<!--                        <li><a href="--><?//= Url::to(['site/list', 'id' => 14])?><!--">--><?//=Yii::t('main', 'Xizmatlar')?><!--</a></li>-->
                        <li class="mobile_logo"><a href="<?= Url::to(['site/index'])?>"><img src="/img/logo_almix.png" alt=""/></a></li>
                        <li><a href="<?= Url::to(['site/list', 'id' => 2])?>"><?=Yii::t('main', 'Yangiliklar')?></a></li>
<!--                        <li><a href="--><?//= Url::to(['site/view', 'id' => 12])?><!--">--><?//=Yii::t('main', 'Kompaniya haqida')?><!--</a></li>-->
<!--                        <li><a href="--><?//= Url::to(['site/contacts'])?><!--">--><?//=Yii::t('main', 'Bog‘lanish')?><!--</a></li>-->
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
