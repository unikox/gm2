<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property int $request_id
 * @property string $body
 * @property int $create_at
 * @property int $update_at
 *
 * @property Request $request
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }
    public function behaviors()
         {
             return [
                 'timestamp' => [
                     'class' => 'yii\behaviors\TimestampBehavior',
                     'attributes' => [
                         ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
                         ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
                     ],
                 ],
             ];
         }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'body'], 'required'],
            [['request_id', 'create_at', 'update_at'], 'integer'],
            [['body'], 'string', 'max' => 512],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Сообщение от',
            'body' => 'Ответ',
            'create_at' => 'Создан',
            'update_at' => 'Изменен',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['id' => 'request_id']);
    }
}
