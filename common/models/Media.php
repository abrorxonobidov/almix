<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property string $title
 * @property int $type_id
 */
class Media extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id', 'type_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['title'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'title' => Yii::t('main', 'Title'),
            'type_id' => Yii::t('main', 'Type ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MediaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MediaQuery(get_called_class());
    }
}
