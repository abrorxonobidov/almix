<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:29
 */

namespace frontend\widgets;


use frontend\models\ListsSearch;
use yii\base\Widget;

class PartnerWidget extends Widget
{

    public function run()
    {
        $searchModel = new ListsSearch();
        $searchModel['category_id'] = 11;
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->pageSize = 5;
        $dataProvider->pagination->page = 0;
        return $this->render('partnerView', [
            'dataProvider' => $dataProvider
        ]);
    }
}