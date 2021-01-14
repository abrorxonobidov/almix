<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:24
 */

namespace frontend\widgets;


use frontend\models\ListsSearch;
use yii\base\Widget;

class AdvantagesWidget extends Widget
{
    public function run()
    {
        $searchModel = new ListsSearch();
        $searchModel['category_id'] = 6;
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->pageSize = 8;
        $dataProvider->pagination->page = 0;
        return $this->render('advantagesView', [
            'dataProvider' => $dataProvider
        ]);
    }
}