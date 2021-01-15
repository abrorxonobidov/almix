<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 16.01.2021
 * Time: 0:20
 */

use yii\bootstrap\Html;

/**
 * @var $list \common\models\Lists
 */
$imageSrc = $list->preview_image ? "/uploads/$list->preview_image" : '/img/default_image.jpg';

?>
<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span>
                <?= $list->category->titleLang ?>
            </span>
        </div>

        <div class="news_full_content">
            <div class="full_content_img">
                <span class="cont_img">
                    <?= Html::img($imageSrc, ['alt' => $list->titleLang]) ?>
                </span>
                <span class="full_cont_title">
                    <p><?= $list->titleLang ?></p>
                    <i><?= ($updated = $list->updated) === null ? '' : date('d M Y', strtotime($updated->date)) ?></i>
                </span>
            </div>
            <p>
                <?= $list->previewLang ?>
            </p>

            <div>
                <?= $list->descriptionLang ?>
            </div>

            <div>
                <!--todo bu yerda $list->gallery ko'rinishi kerak -->
            </div>
        </div>

        <!--
        todo shu yerda nima ko'rsatishni o'ylab ko'rish kerak
        <div class="flex-row row hasMargin hasMargin_inner">
            <div class="col-lg-4 col-md-4 col-sm-6 news_box">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#" class="news_image"><img src="/img/swiper_slider_img3.jpg" alt=""/></a>
                        <div class="news_link">
                            <a href="#">Innovatsion texnologiyalarning zamonaviy yutuqlari</a>
                        </div>
                    </div>
                </div>
                <span class="date">20 декабря 2020</span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 news_box">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#" class="news_image"><img src="/img/swiper_slider_img1.jpg" alt=""/></a>
                        <div class="news_link">
                            <a href="#">“Ilm-maʼrifat va raqamli iqtisodiyotni rivojlantirish yili” doirasida mustaqil
                                taʼlim yoʻlida hamkorlik</a>
                        </div>
                    </div>
                </div>
                <span class="date">20 декабря 2020</span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 news_box">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#" class="news_image"><img src="/img/swiper_slider_img6.jpg" alt=""/></a>
                        <div class="news_link">
                            <a href="#">Bilim olishning zamonaviy usuli</a>
                        </div>
                    </div>
                </div>
                <span class="date">20 декабря 2020</span>
            </div>
        </div>-->
    </div>
</section>