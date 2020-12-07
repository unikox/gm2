<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%slider}}`.
 */
class m201111_114821_add_dsturl_column_to_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%slider}}', 'url_dst', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%slider}}', 'url_dst');
    }
}
