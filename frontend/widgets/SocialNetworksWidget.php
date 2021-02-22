<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23-Feb-21
 * Time: 00:14
 */

namespace frontend\widgets;


use common\models\Lists;
use yii\base\Widget;
use yii\bootstrap\Html;

/**
 * Class SocialNetworksWidget
 * @package frontend\widgets
 */
class SocialNetworksWidget extends Widget
{

    public function run()
    {

        $lists = Lists::find()
            ->where(['category_id' => 16])
            ->active()
            ->orderBy(['order' => SORT_DESC])
            ->all();
        $items =[];
        foreach ($lists as $list)
            $items[] = Html::a(
                Html::tag('i', '', ['class' => 'fa fa-' . strtolower($list->title_uz)]),
                $list->preview_uz, ['target' => '_blank']
            );

        return
            Html::ul(
                $items,
                [
                    'class' => 'social-icons',
                    'encode' => false
                ]
            );
    }
}