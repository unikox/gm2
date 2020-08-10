<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Url;
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
    public $imageFile;

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
            [['imageFile'], 'file',  'extensions' => 'png, jpg, jpeg, gif']
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
            'item_name' => 'Имя элемента',
            'url' => 'Ссылка',
            'title' => 'Всплывающая подсказка',
            'position' => 'Позиция',
            'posted' => 'Показывать',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SliderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderQuery(get_called_class());
    }


    public function upload()
    {
        if ($this->validate()) {

            //$this->item_name= $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->url =Url::base( true) . '/uploads/'.$this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->save();
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
