<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%template}}`.
 */
class m201121_201534_create_template_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%template}}', [
            'id' => $this->primaryKey(),
            'update_at' => $this->integer(),
            'header_body' => $this->text(),
            'footer_body' => $this->text(),
            'posted' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%template}}');
    }
}
