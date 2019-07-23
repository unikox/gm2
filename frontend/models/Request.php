<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property int $create_at
 * @property int $update_at
 *
 * @property Answer[] $answers
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $verifyCode;
    
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
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

    public function rules()
    {
        return [
	    [['name', 'body', 'email', 'subject' ], 'required'],
            [['create_at', 'update_at'], 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 64],
            [['body'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'email' => 'Обратный e-mail',
            'subject' => 'Тема',
            'body' => 'Сообщение',
            'verifyCode' => 'Проверочный код',
            'create_at' => 'Создано',
            'update_at' => 'Редактировано',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['request_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return RequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RequestQuery(get_called_class());
    }
    public function getRc()
    {
        return 'zzzz';
    }
}
