<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:26
 */

use yii\bootstrap\Html;

/**
 * @var $video \common\models\Lists
 */

$files = glob($video::uploadImagePath() . $video->gallery . "/{*.mp4}", GLOB_BRACE);
$filePath = explode('/', @$files[0]);
$fileName = end($filePath);
?>

<section class="block_fourth">
    <div class="container h_width">
        <div class="video_b">
            <div class="col-lg-6">
                <span class="title">
                    <?= $video->titleLang ?>
                </span>
                <p class="product_text">
                    <?= $video->previewLang ?>
                </p>
            </div>
            <div class="col-lg-6">
                <div class="video_box">
                    <a data-fancybox="images" href="<?= "/uploads/$video->gallery/$fileName" ?>">
                        <span>
                            <?= Html::img("@web/uploads/$video->preview_image") ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>