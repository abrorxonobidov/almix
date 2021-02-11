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
 * @var $this \yii\web\View
 */

$imageSrc = $list->preview_image ? "/uploads/$list->preview_image" : '/img/default_image.jpg';
$this->title = $list->category->titleLang . ' | ' . $list->titleLang;

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

            <?= $list->descriptionLang ?>

            <div class="text-center">
                <?= $list->gallery ? \frontend\widgets\InnerGalleryWidget::widget(['folder' => $list->gallery]) : '' ?>
            </div>
        </div>

        <?= \frontend\widgets\NewsWidget::widget(['current_id' => $list->id]) ?>

    </div>
</section>