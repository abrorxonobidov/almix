<?php
/**
 * Created by PhpStorm.
 * User: Abrorxon Obidov
 * Date: 07-Feb-21
 * Time: 18:00
 */

namespace frontend\components;

use kowap\lightgallery\LightGalleryWidget;
use yii\helpers\Json;

class MyLightGalleryWidget extends LightGalleryWidget
{
    public function registerClientScript()
    {
        $view = $this->getView();
        MyLightGalleryAsset::register($view);
        $options = Json::encode($this->options);
        $js = '$("#' . $this->id . '").lightGallery(' . $options . ');';
        $view->registerJs($js);
    }
}