<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 08-Feb-21
 * Time: 20:00
 */

namespace frontend\widgets;

use common\models\Lists;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

/**
 * Class NewsWidget
 * @package frontend\widgets
 *
 * @property Lists $current_list
 */
class SimilarListItemsWidget extends Widget
{

    public $current_list = null;

    public function run()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Lists::find()
                ->where(['category_id' => $this->current_list->category_id])
                ->andWhere(['!=', 'id', $this->current_list->id])
                ->active()
                ->orderBy(new Expression('rand()')),
            'pagination' => [
                'pageSize' => 3
            ]
        ]);
        return $this->render('similarListItemsView', [
            'dataProvider' => $dataProvider,
            'category' => $this->current_list->category
        ]);
    }
}