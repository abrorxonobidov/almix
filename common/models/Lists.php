<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "lists".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $preview_uz
 * @property string|null $preview_ru
 * @property string|null $preview_en
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property string|null $description_en
 * @property string|null $preview_image
 * @property string|null $gallery
 * @property int|null $order
 * @property int|null $status
 * @property int|null $region_id
 * @property string|null $inner_image
 *
 * @property ListCategory $category
 */
class Lists extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title_uz'], 'required'],
            [['category_id', 'order', 'status', 'region_id'], 'integer'],
            [['description_uz', 'description_ru', 'description_en'], 'string'],
            [['title_uz', 'title_ru', 'title_en', 'preview_uz', 'preview_ru', 'preview_en', 'preview_image', 'gallery', 'inner_image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['order'], 'default', 'value' => 500],
            [['status'], 'default', 'value' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return parent::attributeLabels() + [
            'category_id' => Yii::t('main', 'Kategoriya ID'),
            'category.titleLang' => Yii::t('main', 'Kategoriya'),
            'preview_image' => Yii::t('main', 'Izoh rasmi'),
            'inner_image' => Yii::t('main', 'Ichki rasmi'),
            'helpInnerImage' => Yii::t('main', 'Ichki rasmi'),
            'gallery' => Yii::t('main', 'Gallery'),
            'helpGallery' => Yii::t('main', 'Gallery'),
            'region_id' => Yii::t('main', 'Viloyat'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ListCategory::class, ['id' => 'category_id']);
    }


    /**
     * Gets query for [[Regions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'region_id']);
    }

    /**
     * {@inheritdoc}
     * @return ListsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListsQuery(get_called_class());
    }

    public function inputGalleryConfig()
    {
        $config = [
            'path' => [],
            'config' => []
        ];
        if (!$this->isNewRecord && !empty($this->gallery)) {

            $files = glob(self::uploadImagePath() . $this->gallery . Yii::$app->params['allowedImageExtension'], GLOB_BRACE);

            foreach ($files as $file) {
                $filePath = explode('/', $file);
                $imageName = end($filePath);
                if (file_exists($file)) {
                    $config['path'][] = Url::to(self::imageSourcePath() .  $this->gallery . '/' . $imageName);
                    $config['config'][] = [
                        'caption' => $imageName,
                        'size' => filesize($file),
                        'url' => Url::to(['lists/gallery-remove']),
                        'key' => $this->gallery,
                        'extra' => [
                            'id' => $this->id,
                            'count' => count($files),
                            'imageName' => $imageName
                        ],
                    ];
                }
            }
        }
        return $config;
    }
}
