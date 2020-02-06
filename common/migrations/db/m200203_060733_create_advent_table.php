<?php

use yii\db\Migration;

/**
 * Handles the creation of table `advent`.
 */
class m200203_060733_create_advent_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('advent', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'price' => $this->decimal(),
            'contacts' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('advent');
    }
}
