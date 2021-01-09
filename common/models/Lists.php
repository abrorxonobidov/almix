<?php

namespace common\models;

use Yii;

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
            [['category_id', 'order'], 'integer'],
            [['description_uz', 'description_ru', 'description_en'], 'string'],
            [['title_uz', 'title_ru', 'title_en', 'preview_uz', 'preview_ru', 'preview_en', 'preview_image', 'gallery'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListCategory::class, 'targetAttribute' => ['category_id' => 'id']],
            [['order'], 'default', 'value' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return parent::attributeLabels() + [
            'category_id' => Yii::t('main', 'Category ID'),
            'preview_image' => Yii::t('main', 'Azoh rasmi'),
            'gallery' => Yii::t('main', 'Gallery'),
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
     * {@inheritdoc}
     * @return ListsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListsQuery(get_called_class());
    }
}
