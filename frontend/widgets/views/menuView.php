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
        <a href="<?= Url::to(['site/index'])?>" class="header_mobile_logo">
            <img src="/img/logo_almix.png" alt="" width="180" />
        </a>
        <div class="head_menu" id="headMenu">
            <nav class="navbar" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed">
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
                        <li><a href="<?= Url::to(['site/about'])?>"><?=Yii::t('main', 'Biz haqimizda')?></a></li>
                        <li><a href="<?= Url::to(['site/list', 'id' => 2])?>"><?=Yii::t('main', 'Yangiliklar')?></a></li>
                        <li class="mobile_logo">
                            <a href="<?= Url::to(['site/index'])?>">
                                <img src="/img/logo_almix.png" alt="" width="180"/>
                            </a>
                        </li>
                        <li><a href="<?= Url::to(['site/list', 'id' => 4])?>"><?=Yii::t('main', 'Media')?></a></li>
                        <li><a href="<?= Url::to(['site/list', 'id' => 15])?>"><?=Yii::t('main', 'Faxriy hodimlar')?></a></li>
                        <li><a href="<?= Url::to(['site/co-working'])?>"><?=Yii::t('main', 'Co-working')?></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
