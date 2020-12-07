<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m200913_230350_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [

            'id' => $this->primaryKey(),
            'create_at' => $this->integer(),
            'update_at' => $this->integer(),
            'catnews' => $this->integer(),
            'title' => $this->string(),
            'shortbody' => $this->text(),
            'body' => $this->text(),
            'archived' => $this->boolean(),
            'posted' => $this->boolean(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
