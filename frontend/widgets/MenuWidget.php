<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 13.01.2021
 * Time: 17:42
 */

namespace frontend\widgets;


use yii\base\Widget;

class MenuWidget extends Widget
{
    public function run()
    {
        return $this->render('menuView');
    }
}