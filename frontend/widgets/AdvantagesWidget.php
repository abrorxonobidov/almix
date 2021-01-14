<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:24
 */

namespace frontend\widgets;


use yii\base\Widget;

class AdvantagesWidget extends Widget
{
    public function run()
    {
        return $this->render('advantagesView');
    }
}