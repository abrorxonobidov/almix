<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:30
 */

use yii\bootstrap\Modal;
use yii\bootstrap\Html;

?>

    <section class="block_seventh">
        <div class="container h_width">
            <div class="map_box" id="map_box">
                <div id="vmap"></div>
                <div id="mapLabels"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>

<? Modal::begin([
    'id' => 'region-modal',
    'header' => Html::tag('h2', '...', ['id' => 'myModalLabel', 'class' => 'title modal-title text-center']),
    'size' => Modal::SIZE_LARGE
]);
//echo Html::tag('p', Html::icon('refresh', ['class' => 'modal-region-spinner']), ['class' => 'text-center', 'style' => 'font-size: 140px; color: #00cdff; margin-top:50px;']);

?>

    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img class="media-object" src="/img/navoiy_reg.png" alt="...">
            </a>
        </div>
        <div class="media-body media-middle">
            <h4 class="media-heading title">Media heading</h4> <br>
            <div class="news_full_content">
                <p>
                    Cras sit amet nibh libero, in gravida nulla.
                    Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    Fusce condimentum nunc ac nisi vulputate fringilla.
                    Donec lacinia congue felis in faucibus.
                </p>
            </div>
            <p class="text-right">
                <a href="#">Batafsil ...</a>
            </p>
        </div>
    </div>
    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img class="media-object" src="/img/navoiy_reg.png" alt="...">
            </a>
        </div>
        <div class="media-body media-middle">
            <h4 class="media-heading title">Media heading</h4> <br>
            <div class="news_full_content">
                <p>
                    Cras sit amet nibh libero, in gravida nulla.
                    Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    Fusce condimentum nunc ac nisi vulputate fringilla.
                    Donec lacinia congue felis in faucibus.
                </p>
            </div>
            <p class="text-right">
                <a href="#">Batafsil ...</a>
            </p>
        </div>
    </div>
    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img class="media-object" src="/img/navoiy_reg.png" alt="...">
            </a>
        </div>
        <div class="media-body media-middle">
            <h4 class="media-heading title">Media heading</h4> <br>
            <div class="news_full_content">
                <p>
                    Cras sit amet nibh libero, in gravida nulla.
                    Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                    Fusce condimentum nunc ac nisi vulputate fringilla.
                    Donec lacinia congue felis in faucibus.
                </p>
            </div>
            <p class="text-right">
                <a href="#">Batafsil ...</a>
            </p>
        </div>
    </div>

<?
Modal::end()
?>