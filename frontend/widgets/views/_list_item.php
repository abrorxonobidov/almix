<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 15.01.2021
 * Time: 23:32
 */

use yii\bootstrap\Html;

/**
 * @var $list \common\models\Lists
 */

$imageSrc = $list->preview_image ? "/uploads/$list->preview_image" : '/img/default_image.jpg';

?>
<div class="thumbnail">
    <div class="caption">
        <?= Html::a(Html::img($imageSrc, ['alt' => $list->titleLang]), ['site/view', 'id' => $list->id], ['class' => 'news_image']) ?>
        <div class="news_link">
            <?= Html::a($list->titleLang, ['site/view', 'id' => $list->id]) ?>
        </div>
    </div>
</div>
<a href="<?= \yii\helpers\Url::to([$view, 'id' => $list->id]) ?>" style="text-decoration: none; display: block">
    <span class="date"><?= $list->date ? date('d M Y', strtotime($list->date)) : '' ?></span>
</a>