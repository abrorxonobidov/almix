<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 14.01.2021
 * Time: 16:21
 */

namespace frontend\widgets;


use common\models\Lists;
use yii\base\Widget;

class VideoWidget extends Widget
{
    public function run()
    {
        return $this->render('videoView', [
            'video' => Lists::find()
                ->where(['category_id' => 9])
                ->orderBy(['order' => SORT_DESC])
                ->active()
                ->one()
        ]);
    }
}