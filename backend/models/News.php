<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property int|null $catnews
 * @property string|null $title
 * @property string|null $shortbody
 * @property string|null $body
 * @property int|null $archived
 * @property int|null $posted
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
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

    public function rules()
    {
        return [
            [['create_at', 'update_at', 'catnews', 'archived', 'posted'], 'integer'],
            [['shortbody', 'body'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_at' => 'Создана',
            'update_at' => 'Изменена',
            'catnews' => 'Категория',
            'title' => 'Заголовок',
            'shortbody' => 'Краткое описание',
            'body' => 'Новость',
            'archived' => 'Устарела',
            'posted' => 'Опубликована',
        ];
    }
}
