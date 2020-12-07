<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property int $slider_id
 * @property string $item_name
 * @property string $url
 * @property string $title
 * @property int $position
 * @property int $posted
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_id', 'position', 'posted'], 'integer'],
            [['item_name', 'url', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_id' => 'Slider ID',
            'item_name' => 'Item Name',
            'url' => 'Url',
            'url_dst' => 'Ссылка для перехода',
            'title' => 'Title',
            'position' => 'Position',
            'posted' => 'Posted',
        ];
    }
    public function getSliderItems($item_name){

        $resItems = $this->find()->where(['item_name' => $item_name,'posted'=>1])->asArray()->orderBy('position')->all();
        return $resItems;
    }
}
