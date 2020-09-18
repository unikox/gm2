<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hpage}}`.
 */
class m200918_050215_create_hpage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hpage}}', [
            'id' => $this->primaryKey(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'body' => $this->text(),
            'actual' => $this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hpage}}');
    }
}
