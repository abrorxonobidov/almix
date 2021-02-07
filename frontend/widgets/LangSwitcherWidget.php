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

class LangSwitcherWidget extends \yii\base\Widget
{
    public function run()
    {
        $languages = Yii::$app->params['languagesShort'];
        $currentLang = $languages[Yii::$app->language];
        unset($languages[Yii::$app->language]);
        $params = Yii::$app->request->queryParams;
        $items = [];
        foreach ($languages as $code => $language) {
            $params[0] = '';
            $params['language'] = $code;
            $items[] = Html::a($language, $params);
        }
        return Html::ul(
            [
                Html::a($currentLang . Html::tag('span', '', ['class' => 'caret']), '#', ['class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'role' => 'button']) .
                Html::ul($items,
                    [
                        'class' => 'dropdown-menu',
                        'encode' => false
                    ])
            ],
            [
                'class' => 'lang text-uppercase',
                'encode' => false,
                'itemOptions' => [
                    'class' => 'dropdown'
                ]
            ]
        );
    }
}