<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:30
 */

use yii\bootstrap\Modal;
use yii\bootstrap\Html;

Modal::begin([
    'id' => 'region-modal',
    'header' => Html::tag('h2', '...', ['id' => 'myModalLabel', 'class' => 'title modal-title text-center']),
    'size' => Modal::SIZE_LARGE
]);
echo Html::tag('p', Html::icon('refresh', ['class' => 'modal-region-spinner']), ['class' => 'text-center', 'style' => 'font-size: 140px; color: #00cdff; margin-top:50px;']);
Modal::end()
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
