<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property int|null $update_at
 * @property string|null $header_body
 * @property string|null $footer_body
 * @property int|null $posted
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['update_at', 'posted'], 'integer'],
            [['header_body', 'footer_body'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'update_at' => 'Изменен',
            'header_body' => 'Шапка(Header)',
            'footer_body' => 'Подвал(Footer)',
            'posted' => 'Опубликован',
        ];
    }
    public function getHeader(){
        $sql ='SELECT header_body FROM `template` WHERE posted = 1';
        $header = Yii::$app->db->createCommand($sql)->queryAll();;
        return $header;

    }
    public function  getFooter(){
        $sql='SELECT footer_body FROM `template` WHERE posted = 1';
        $footer = Yii::$app->db->createCommand($sql)->queryAll();
        return $footer;
    }

}
