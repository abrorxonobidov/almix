<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11-Feb-21
 * Time: 13:38
 */

namespace frontend\widgets;


use common\models\BaseActiveRecord;
use frontend\components\MyLightGalleryWidget;
use yii\base\Widget;
use yii\bootstrap\Html;
use Yii;

/**
 * Class InnerGalleryWidget
 * @package frontend\widgets
 *
 * @property string $folder
 * @property string $preview_image
 */
class InnerGalleryWidget extends Widget
{
    public $folder;
    public $preview_image = null;

    public function run()
    {
        $images = glob(BaseActiveRecord::uploadImagePath() . $this->folder . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);
        sort($images);
        $items = $this->preview_image ? [
            [
                'thumb' => $this->preview_image,
                'src' => $this->preview_image
            ]
        ] : [];
        foreach ($images as $image) {
            $filePath = explode('/', $image);
            $fileName = end($filePath);
            $items[] = [
                'thumb' => "/uploads/{$this->folder}/$fileName",
                'src' => "/uploads/{$this->folder}/$fileName",
            ];
        }
        return $items ?
            Html::tag('h3', Yii::t('main', 'Fotogalereya'), ['class' => 'title'])
            . MyLightGalleryWidget::widget([
                'id' => 'region_light_gallery',
                'items' => $items,
                'options' => [
                    'mode' => 'lg-zoom-in-big',
                    'share' => false,
                    'rotate' => false,
                    'flipHorizontal' => false,
                    'flipVertical' => false
                ]
            ]) : '';
    }
}