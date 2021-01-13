<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 13.01.2021
 * Time: 16:03
 */

namespace frontend\widgets;

use yii\bootstrap\Html;
use Yii;

class LangSwitcher extends \yii\base\Widget
{
    public function run()
    {
        $languages = Yii::$app->params['languagesShort'];
        unset($languages[Yii::$app->language]);
        $items = [];
        foreach ($languages as $code => $language)
            $items[] = Html::a($language, ['', 'language' => $code]);
        return Html::ul(
            [
                Html::a(Yii::$app->language . Html::tag('span', '', ['class' => 'caret']), '#', ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'role' => 'button']) .
                Html::ul($items,
                    [
                        'class' => 'dropdown-menu',
                        'encode' => false,
                    ])
            ],
            [
                'class' => 'lang',
                'encode' => false,
                'itemOptions' => [
                    'class' => 'dropdown'
                ]
            ]
        );
    }
}