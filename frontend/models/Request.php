<?php

namespace app\models;

use Yii;

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
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at'], 'required'],
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
            'name' => 'Name',
            'email' => 'Email',
            'subject' => 'Subject',
            'body' => 'Body',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
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
}
