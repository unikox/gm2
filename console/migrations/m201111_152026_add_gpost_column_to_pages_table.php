<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pages}}`.
 */
class m201111_152026_add_gpost_column_to_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pages}}', 'gpost', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%pages}}', 'gpost');
    }
}
