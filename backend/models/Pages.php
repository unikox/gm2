<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property int $menuitem_id
 * @property string $page_body
 * @property int $created_at
 * @property int $updated_at
 * @property boolean $gpost
 *
 * @property Menuitems $menuitem
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
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
            [['menuitem_id', 'created_at', 'updated_at'], 'integer'],
            [['page_body'], 'string'],
            [['name', 'gpost'], 'string', 'max' => 255],
            [['menuitem_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menuitems::className(), 'targetAttribute' => ['menuitem_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'menuitem_id' => 'Раздел меню',
            'page_body' => 'Содержимое',
            'created_at' => 'Создано',
            'updated_at' => 'Изменeно',
            'gpost' => 'Поместить в главное меню',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuitem()
    {
        return $this->hasOne(Menuitems::className(), ['id' => 'menuitem_id']);
    }
}
