<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 12-Mar-21
 * Time: 23:39
 */
?>

<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 08-Feb-21
 * Time: 20:00
 */

use frontend\components\MyLightGalleryWidget;

/**
 * @var $list \common\models\Lists
 * @var $this \yii\web\View
 */

$imageSrc = $list->preview_image ? "/uploads/$list->preview_image" : '/img/default_image.jpg';

$this->title = Yii::t('main', 'Co-working markazi');

?>
<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span>
                <?= $this->title ?>
            </span>
        </div>
        <div class="news_full_content">
            <div class="row region-description">
                <div class="col-sm-push-8 col-sm-4">
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
                            <?= $list->previewLang ?>
                        </h3>
                    </div>
                    <? if ($list->inner_image) { ?>
                        <br>
                        <div class="manager-area">
                            <?= MyLightGalleryWidget::widget([
                                'id' => 'partner_inner_image',
                                'items' => [
                                    [
                                        'thumb' => "/uploads/$list->inner_image",
                                        'src' => "/uploads/$list->inner_image",
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
                                <?= $list->titleLang ?>
                            </h3>
                        </div>
                    <? } ?>
                    <div class="text-center">
                        <?= $list->gallery ? \frontend\widgets\InnerGalleryWidget::widget(['folder' => $list->gallery]) : '' ?>
                    </div>
                </div>
                <div class="col-sm-pull-4 col-sm-8">
                    <?= $list->descriptionLang ?>
                </div>
            </div>

        </div>

    </div>
</section>

