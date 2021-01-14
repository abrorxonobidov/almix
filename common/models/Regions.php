<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $title_uz
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property int|null $order
 * @property int|null $status
 * @property string $code
 */
class Regions extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'order', 'status'], 'integer'],
            [['title_uz', 'title_ru', 'title_en'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 2],
            [['title_uz', 'title_ru', 'title_en', 'code'], 'required'],
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
            'order' => Yii::t('main', 'Sort'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return RegionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RegionsQuery(get_called_class());
    }
}
