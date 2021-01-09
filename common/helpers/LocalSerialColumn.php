<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22-Dec-20
 * Time: 21:25
 */

namespace common\helpers;


use yii\bootstrap\Html;
use yii\grid\SerialColumn;
use Yii;

class LocalSerialColumn extends SerialColumn
{
    protected function renderFilterCellContent()
    {
        return Html::a(
            Html::icon('refresh'),
            [Yii::$app->controller->route],
            ['title' => Yii::t('main', 'Очистить фильтр')]
        );
    }

}