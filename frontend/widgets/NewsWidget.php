<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:29
 */

namespace frontend\widgets;


use common\models\Lists;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

/**
 * Class NewsWidget
 * @package frontend\widgets
 *
 * @property array $current_id
 */
class NewsWidget extends Widget
{

    public $current_id = null;

    public function run()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Lists::find()
                ->andWhere(['category_id' => 2, 'status' => 1])
                ->andFilterWhere(['!=', 'id', $this->current_id])
                ->orderBy(['order' => SORT_DESC, 'id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 3
            ]
        ]);
        return $this->render('newsView', [
            'dataProvider' => $dataProvider
        ]);
    }
}