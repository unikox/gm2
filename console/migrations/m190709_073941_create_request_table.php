<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m190709_073941_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64),
            'email' => $this->string(64),
            'subject' => $this->string(64),
            'body' => $this->string(512),
            'create_at' => $this->integer()->notNull(),
            'update_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
