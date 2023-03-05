<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hpage".
 *
 * @property int $id
 * @property int|null $create_at
 * @property int|null $update_at
 * @property string|null $body
 * @property int|null $actual
 */
class Hpage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hpage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at', 'actual'], 'integer'],
            [['body'], 'string'],
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
            'body' => Yii::t('app', 'Body'),
            'actual' => Yii::t('app', 'Actual'),
        ];
    }

    public static function getBody(){
        $sql = 'SELECT `body` FROM `hpage` ';
        $hPageBody = Yii::$app->db->createCommand($sql)->queryAll();
        return $hPageBody;
    }


}
