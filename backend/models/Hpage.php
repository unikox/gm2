<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "hpage".
 *
 * @property int $id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property string|null $body
 * @property int|null $actual
 */
class Hpage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hpage';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at', 'actual'], 'integer'],
            [['body'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Создан',
            'update_at' => 'Изменен',
            'body' => 'Материал',
            'actual' => 'Использовать',
        ];
    }
}
