<?php

namespace app\models;

use Yii;

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
            'id' => Yii::t('app', 'ID'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'catnews' => Yii::t('app', 'Catnews'),
            'title' => Yii::t('app', 'Title'),
            'shortbody' => Yii::t('app', 'Shortbody'),
            'body' => Yii::t('app', 'Body'),
            'archived' => Yii::t('app', 'Archived'),
            'posted' => Yii::t('app', 'Posted'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
