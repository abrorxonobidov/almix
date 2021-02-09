<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 07-Feb-21
 * Time: 02:30
 */

use yii\bootstrap\Html;
use frontend\components\MyLightGalleryWidget;

/**
 * @var $region \common\models\Lists
 * @var $this \yii\web\View
 */

$imageSrc = $region->preview_image ? "/uploads/$region->preview_image" : '/img/default_image.jpg';
$managerImageSrc = $region->inner_image ? "/uploads/$region->inner_image" : '/img/sales_manager.png';

$this->title = $region->category->titleLang . ' | ' . $region->titleLang;

?>
<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span>
                <?= $region->category->titleLang ?>
            </span>
        </div>

        <div class="news_full_content">
            <div class="full_content_img">
                <span class="cont_img">
                    <?= Html::img($imageSrc, ['alt' => $region->titleLang]) ?>
                </span>
                <span class="full_cont_title">
                    <?= $region->titleLang ?>
                </span>
            </div>
            <div class="row region-description">
                <div class="col-sm-8">
                    <?= $region->descriptionLang ?>
                </div>
                <div class="col-sm-4">
                    <div class="manager-area">
                        <?= MyLightGalleryWidget::widget([
                            'id' => 'region_manager_image',
                            'items' => [
                                [
                                    'thumb' => "$managerImageSrc",
                                    'src' => "$managerImageSrc",
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
                        <p class="text-center">
                            <?= $region->previewLang ?>
                        </p>
                    </div>
                </div>
            </div>

            <br>

            <div class="text-center">
                <? if ($region->gallery) {
                    $images = glob($region::uploadImagePath() . $region->gallery . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);
                    $items = [];
                    foreach ($images as $image) {
                        $filePath = explode('/', $image);
                        $fileName = end($filePath);
                        $items[] = [
                            'thumb' => "/uploads/{$region->gallery}/$fileName",
                            'src' => "/uploads/{$region->gallery}/$fileName",
                        ];
                    }
                    if ($items) {
                        echo Html::tag('h3', Yii::t('main', 'Fotogalereya'), ['class' => 'title']);
                        echo MyLightGalleryWidget::widget([
                            'id' => 'region_light_gallery',
                            'items' => $items,
                            'options' => [
                                'mode' => 'lg-zoom-in-big',
                                'share' => false,
                                'rotate' => false,
                                'flipHorizontal' => false,
                                'flipVertical' => false
                            ]
                        ]);
                    }
                }
                ?>
            </div>
        </div>

        <?=\frontend\widgets\SimilarListItemsWidget::widget(['current_list' => $region])?>

    </div>
</section>