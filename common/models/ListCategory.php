<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "list_category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $image
 * @property int|null $type_id
 *
 * @property Lists[] $lists
 * @property ListCategory $parent
 * @property ListCategory[] $children
 */
class ListCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'list_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'type_id'], 'integer'],
            [['title_uz'], 'required'],
            [['title_uz', 'title_ru', 'title_en', 'image'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => ListCategory::class, 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'parent_id' => Yii::t('main', 'Parent ID'),
            'title_uz' => Yii::t('main', 'Title Uz'),
            'title_ru' => Yii::t('main', 'Title Ru'),
            'title_en' => Yii::t('main', 'Title En'),
            'image' => Yii::t('main', 'Image'),
            'type_id' => Yii::t('main', 'Type ID'),
        ];
    }

    /**
     * Gets query for [[Lists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLists()
    {
        return $this->hasMany(Lists::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(ListCategory::class, ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[ListCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(ListCategory::class, ['parent_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ListCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListCategoryQuery(get_called_class());
    }
}
