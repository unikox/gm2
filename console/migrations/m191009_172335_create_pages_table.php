<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%menuitems}}`
 */
class m191009_172335_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'menuitem_id' => $this->integer(),
            'page_body' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `menuitem_id`
        $this->createIndex(
            '{{%idx-pages-menuitem_id}}',
            '{{%pages}}',
            'menuitem_id'
        );

        // add foreign key for table `{{%menuitems}}`
        $this->addForeignKey(
            '{{%fk-pages-menuitem_id}}',
            '{{%pages}}',
            'menuitem_id',
            '{{%menuitems}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%menuitems}}`
        $this->dropForeignKey(
            '{{%fk-pages-menuitem_id}}',
            '{{%pages}}'
        );

        // drops index for column `menuitem_id`
        $this->dropIndex(
            '{{%idx-pages-menuitem_id}}',
            '{{%pages}}'
        );

        $this->dropTable('{{%pages}}');
    }
}
