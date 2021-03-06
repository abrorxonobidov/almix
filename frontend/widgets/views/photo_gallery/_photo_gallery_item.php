<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 20:48
 */

use yii\bootstrap\Html;

/**
 * @var $model \common\models\Lists
 */

$files = glob($model::uploadImagePath() . $model->gallery . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);
$filePath_0 = explode('/', @$files[0]);
$fileName_0 = end($filePath_0);
$filePath_1 = explode('/', @$files[1]);
$fileName_1 = end($filePath_1);

?>

<ul class="swipe_slider_list">
    <li>
        <span class="main_img">
            <img src="/uploads/<?= $model->preview_image ?>" alt=""/>
        </span>
        <span class="link_box">
               <?=Html::a($model->titleLang, ['site/gallery', 'id' => $model->id])?>
        </span>
    </li>
    <li>
        <img src="/uploads/<?= $model->gallery . '/' . $fileName_0 ?>" alt=""/>
    </li>
    <li>
        <img src="/uploads/<?= $model->gallery . '/' . $fileName_1 ?>" alt=""/>
    </li>
</ul>
