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
            'name' => 'Name',
            'position' => 'Position',
            'parent_id' => 'Parent ID',
            'url'=> 'Link',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Pages::className(), ['menuitem_id' => 'id']);
    }

    public function getLeftMenu(){
        $sql = 'SELECT * FROM `menuitems` WHERE 1';
        $res = Yii::$app->db->createCommand($sql)->query();
        $menu = array();
        foreach ($res as $key => $variable) {
            foreach ($variable as $key => $value) {
                if($key == "name"){
                    //Пункты меню
                    array_push($menu, $value);
                }
                if ($key == "id") {
                    $sql_menu_items_pages = 'SELECT `menuitem_id`,`name`  FROM `pages` WHERE `menuitem_id` = ' . $value;
                    $menu_items_pages_res = Yii::$app->db->createCommand($sql_menu_items_pages)->queryAll();
                    //Подпункты меню
                    array_push($menu, $value, $menu_items_pages_res );
                }
            }
        }
    }
    public static function getSections(){
        $sql = 'SELECT * FROM `menuitems`';
        $sections = Yii::$app->db->createCommand($sql)->queryAll();
        return $sections;
    }
    public static function getSubSections(){
        $sql = 'SELECT `id`, `gpost`, `menuitem_id`,`name` FROM `pages` ';
        $subsections = Yii::$app->db->createCommand($sql)->queryAll();
        return $subsections;
    }
    public static function getSubSectionsAlone(){
        $sql = 'SELECT `id`, `gpost`, `menuitem_id`,`name` FROM `pages` WHERE `gpost` = 1 ';
        $subsections = Yii::$app->db->createCommand($sql)->queryAll();
        return $subsections;
    }

}
