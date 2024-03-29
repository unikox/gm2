<?php

namespace app\models;

/**
 * This is the model class for table "pages".
 *
 * @property int       $id
 * @property string    $name
 * @property int       $menuitem_id
 * @property string    $page_body
 * @property int       $created_at
 * @property int       $updated_at
 * @property int       $gpost
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menuitem_id', 'created_at', 'updated_at'], 'integer'],
            [['page_body', 'gpost'], 'string'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'menuitem_id' => 'Menuitem ID',
            'page_body' => 'Page Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'gpost' => 'Global menu',
        ];
    }

    public function getCovid()
    {
        $res = $this->find()->Select('page_body')->where(['id' => 26])->asArray()->One();

        return $res;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuitem()
    {
        return $this->hasOne(Menuitems::className(), ['id' => 'menuitem_id']);
    }
}
