<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%request}}`
 */
class m190709_080718_create_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'request_id' => $this->integer()->notNull(),
            'body' => $this->string(512),
            'create_at' => $this->integer()->notNull(),
            'update_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `request_id`
        $this->createIndex(
            '{{%idx-answer-request_id}}',
            '{{%answer}}',
            'request_id'
        );

        // add foreign key for table `{{%request}}`
        $this->addForeignKey(
            '{{%fk-answer-request_id}}',
            '{{%answer}}',
            'request_id',
            '{{%request}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%request}}`
        $this->dropForeignKey(
            '{{%fk-answer-request_id}}',
            '{{%answer}}'
        );

        // drops index for column `request_id`
        $this->dropIndex(
            '{{%idx-answer-request_id}}',
            '{{%answer}}'
        );

        $this->dropTable('{{%answer}}');
    }
}
