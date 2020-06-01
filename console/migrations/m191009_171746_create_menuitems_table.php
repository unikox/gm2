<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menuitems}}`.
 */
class m191009_171746_create_menuitems_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menuitems}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'position' => $this->integer(),
            'parent_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menuitems}}');
    }
}
