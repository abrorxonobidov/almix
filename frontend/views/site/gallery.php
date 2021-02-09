<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 08-Feb-21
 * Time: 20:00
 */

use yii\bootstrap\Html;
use frontend\components\MyLightGalleryWidget;

/**
 * @var $gallery \common\models\Lists
 * @var $this \yii\web\View
 */

$imageSrc = $gallery->preview_image ? "/uploads/$gallery->preview_image" : '/img/default_image.jpg';

$this->title = $gallery->category->titleLang . ' | ' . $gallery->titleLang;

?>
<section class="block_sixth block_sixth_in">

    <div class="container h_width">
        <div class="inner_title">
            <span>
                <?= $gallery->category->titleLang ?>
            </span>
        </div>

        <div class="news_full_content">
            <?= Html::tag('h3', $gallery->titleLang, ['class' => 'title']); ?>

            <?= $gallery->descriptionLang ?>
            <br>
            <div class="text-center">
                <? if ($gallery->gallery) {
                    $images = glob($gallery::uploadImagePath() . $gallery->gallery . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);
                    $items = [
                        [
                            'thumb' => $imageSrc,
                            'src' => $imageSrc
                        ]
                    ];
                    foreach ($images as $image) {
                        $filePath = explode('/', $image);
                        $fileName = end($filePath);
                        $items[] = [
                            'thumb' => "/uploads/{$gallery->gallery}/$fileName",
                            'src' => "/uploads/{$gallery->gallery}/$fileName",
                        ];
                    }
                    if ($items) {
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

        <?=\frontend\widgets\SimilarListItemsWidget::widget(['current_list' => $gallery])?>

    </div>
</section>