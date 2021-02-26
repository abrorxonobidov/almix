<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 08-Feb-21
 * Time: 20:00
 */

use frontend\components\MyLightGalleryWidget;

/**
 * @var $partner \common\models\Lists
 * @var $this \yii\web\View
 */

$imageSrc = $partner->preview_image ? "/uploads/$partner->preview_image" : '/img/default_image.jpg';

$this->title = $partner->category->titleLang . ' | ' . $partner->titleLang;

?>
<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span>
                <?= $partner->titleLang ?>
            </span>
        </div>
        <div class="news_full_content">
            <div class="row region-description">
                <div class="col-sm-8">
                    <?= $partner->descriptionLang ?>
                </div>
                <div class="col-sm-4">
                    <div class="manager-area">
                        <?= MyLightGalleryWidget::widget([
                            'id' => 'region_manager_image',
                            'items' => [
                                [
                                    'thumb' => "$imageSrc",
                                    'src' => "$imageSrc",
                                ]
                            ],
                            'options' => [
                                'mode' => 'lg-zoom-in-big',
                                'share' => false,
                                'rotate' => false,
                                'flipHorizontal' => false,
                                'flipVertical' => false
                            ]
                        ]); ?>
                        <h3 class="text-center">
                            <?= $partner->previewLang ?>
                        </h3>
                    </div>
                    <? if ($partner->inner_image) { ?>
                        <br>
                        <div class="manager-area">
                            <?= MyLightGalleryWidget::widget([
                                'id' => 'partner_inner_image',
                                'items' => [
                                    [
                                        'thumb' => "/uploads/$partner->inner_image",
                                        'src' => "/uploads/$partner->inner_image",
                                    ]
                                ],
                                'options' => [
                                    'mode' => 'lg-zoom-in-big',
                                    'share' => false,
                                    'rotate' => false,
                                    'flipHorizontal' => false,
                                    'flipVertical' => false
                                ]
                            ]); ?>
                            <h3 class="text-center">
                                <?= Yii::t('main', 'Guvohnoma') ?>
                            </h3>
                        </div>
                    <? } ?>
                </div>
            </div>

        </div>

        <?= \frontend\widgets\SimilarListItemsWidget::widget(['current_list' => $partner]) ?>

    </div>
</section>