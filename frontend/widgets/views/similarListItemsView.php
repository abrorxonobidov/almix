<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 08-Feb-21
 * Time: 20:00
 */

use yii\widgets\ListView;
use yii\helpers\Html;

/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $category \common\models\ListCategory
 */

$view = @Yii::$app->params['links'][$category->id] ?? 'site/view';

?>

<section class="block_sixth">
    <div class="container h_width">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'itemView' => '_similar_list_item',
            'viewParams' => [
                'view' => $view,
            ],
            'options' => [
                'tag' => 'div',
                'class' => 'flex-row row hasMargin'
            ],
            'itemOptions' => [
                'tag' => 'div',
                'class' => 'col-lg-4 col-md-4 col-sm-6 news_box'
            ],
            'emptyText' => '',
        ]); ?>
        <?= $category->id == 3 ? '' : Html::a($category->titleLang, ['site/list', 'id' => $category->id], ['class' => 'news_all_link']) ?>
    </div>
</section>
