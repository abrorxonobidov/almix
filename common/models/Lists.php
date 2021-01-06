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
class Lists extends \yii\db\ActiveRecord
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'category_id' => Yii::t('main', 'Category ID'),
            'title_uz' => Yii::t('main', 'Title Uz'),
            'title_ru' => Yii::t('main', 'Title Ru'),
            'title_en' => Yii::t('main', 'Title En'),
            'preview_uz' => Yii::t('main', 'Preview Uz'),
            'preview_ru' => Yii::t('main', 'Preview Ru'),
            'preview_en' => Yii::t('main', 'Preview En'),
            'description_uz' => Yii::t('main', 'Description Uz'),
            'description_ru' => Yii::t('main', 'Description Ru'),
            'description_en' => Yii::t('main', 'Description En'),
            'preview_image' => Yii::t('main', 'Preview Image'),
            'gallery' => Yii::t('main', 'Gallery'),
            'order' => Yii::t('main', 'Order'),
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
