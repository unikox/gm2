<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menuitems".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 * @property int $parent_id
 * @property string $url
 *
 * @property Pages[] $pages
 */
class Menuitems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menuitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position', 'parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя раздела',
            'position' => 'Позиция',
            'parent_id' => 'Родитель',
            'url' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Pages::className(), ['menuitem_id' => 'id']);
    }
}
