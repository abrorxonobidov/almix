<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:21
 */

namespace frontend\widgets;


use yii\base\Widget;

class PhotoGalleryWidget extends Widget
{
    public function run()
    {
        return $this->render('photoGalleryView');
    }
}