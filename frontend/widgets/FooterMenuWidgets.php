<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 15.01.2021
 * Time: 22:44
 */

namespace frontend\widgets;


use yii\base\Widget;

class FooterMenuWidgets extends Widget
{
    public function run()
    {
        return $this->render('footerMenuView');
    }
}