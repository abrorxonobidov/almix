<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:21
 */

namespace frontend\widgets;


use common\models\Lists;
use frontend\models\ListsSearch;
use yii\base\Widget;
use yii\bootstrap\Html;
use yii\widgets\ListView;


class SliderWidget extends Widget
{
    public function run()
    {

        $searchModel = new ListsSearch();
        $searchModel['category_id'] = 13;
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->pageSize = 6;
        $dataProvider->pagination->page = 0;

        return
            Html::beginTag('section', ['class' => 'block_second'])
            .
            ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}',
                'itemView' => function (Lists $list) {
                    return
                        Html::tag('div', Html::img('@web/uploads/' . $list->preview_image), ['class' => 'slider_img'])
                        .
                        Html::tag('div', Html::a(Html::tag('span', $list->titleLang), ['site/view', 'id' => $list->id], ['class' => 'description_in']), ['class' => 'description']);
                },
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'item'
                ],
                'options' => [
                    'tag' => 'div',
                    'id' => 'actual_news_slider',
                    'class' => 'owl-carousel'
                ]
            ])
            .
            Html::endTag('section');
    }
}