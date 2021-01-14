<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:28
 */

use yii\widgets\ListView;

/**
 * @var $dataProvider
 */

?>

<section class="block_fifth">
    <div class="swiper-container_two">
        <div class="swiper-wrapper">
            <span class="title_other">
                <?= Yii::t('main', 'Fotogalereya') ?>
            </span>

            <? echo
            ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}',
                'itemView' => '_photo_gallery_item',
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'swiper-slide'
                ],
                'options' => [
                    'tag' => null,
                ]
            ])
            ?>

        </div>
    </div>
</section>

