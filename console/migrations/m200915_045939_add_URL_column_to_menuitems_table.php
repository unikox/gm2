<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%menuitems}}`.
 */
class m200915_045939_add_URL_column_to_menuitems_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%menuitems}}', 'url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%menuitems}}', 'url');
    }
}
