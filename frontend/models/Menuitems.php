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
        //$menu = array('name' => 'null');
        $menu = array();
//        $menu_array = array( 'menuitem' => 0, 'name' => 'zero', 'item' => array( 'itemname' => 'zero') );

        foreach ($res as $key => $variable) {

            foreach ($variable as $key => $value) {

                if($key == "name"){
                    //Пункты меню
                    //$menu[$key]= $value ;
                    array_push($menu, $value);
                    //echo "$value";

                }
                if ($key == "id") {

                    //echo "<h1>" . $key . ": " . $value . "</h1>" ;
                    $sql_menu_items_pages = 'SELECT `menuitem_id`,`name`  FROM `pages` WHERE `menuitem_id` = ' . $value;
                    $menu_items_pages_res = Yii::$app->db->createCommand($sql_menu_items_pages)->queryAll();
                    //Подпункты меню
                    //$menu[$key][$value][];
                    array_push($menu, $value, $menu_items_pages_res );
                }
            }
        }
        
        var_dump($menu);
        //var_dump($menu_array);
    }
    public function getSections(){
        $sql = 'SELECT * FROM `menuitems`';
        $sections = Yii::$app->db->createCommand($sql)->queryAll();
        return $sections;
    }
    public function getSubSections(){
        $sql = 'SELECT `id`, `menuitem_id`,`name` FROM `pages` ';
        $subsections = Yii::$app->db->createCommand($sql)->queryAll();
        return $subsections;
    }
}
