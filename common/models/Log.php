<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property int $action_id
 * @property string $table_name
 * @property int $row_id
 * @property string $date
 * @property int|null $user_id
 */
class Log extends ActiveRecord
{

    const ACTION_INSERT = 1;
    const ACTION_UPDATE = 2;
    const ACTION_DELETE = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['action_id', 'table_name', 'row_id'], 'required'],
            [['action_id', 'user_id', 'row_id'], 'integer'],
            [['date'], 'safe'],
            [['table_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'action_id' => Yii::t('main', 'Action ID'),
            'table_name' => Yii::t('main', 'Table Name'),
            'row_id' => Yii::t('main', 'Row ID'),
            'date' => Yii::t('main', 'Created At'),
            'user_id' => Yii::t('main', 'User ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LogQuery(get_called_class());
    }
}
