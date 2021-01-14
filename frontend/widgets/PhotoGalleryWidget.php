<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:21
 */

namespace frontend\widgets;


use frontend\models\ListsSearch;
use yii\base\Widget;

class PhotoGalleryWidget extends Widget
{
    public function run()
    {
        $searchModel = new ListsSearch();
        $searchModel['category_id'] = 4;
        $dataProvider = $searchModel->search([]);
        $dataProvider->pagination->pageSize = 6;
        $dataProvider->pagination->page = 0;

        return $this->render('photo_gallery/photoGalleryView', [
            'dataProvider' => $dataProvider
        ]);
    }
}