<?php

use yii\db\Migration;

/**
 * Handles the creation of table `options`.
 * Has foreign keys to the tables:
 *
 * - `car`
 */
class m200203_064306_create_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('options', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer(),
            'conditioner' => $this->integer(),
            'airbags' => $this->integer(),
            'multimedia' => $this->integer(),
            'cruise_control' => $this->integer(),
        ]);

        // creates index for column `car_id`
        $this->createIndex(
            'idx-options-car_id',
            'options',
            'car_id'
        );

        // add foreign key for table `car`
        $this->addForeignKey(
            'fk-options-car_id',
            'options',
            'car_id',
            'car',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `car`
        $this->dropForeignKey(
            'fk-options-car_id',
            'options'
        );

        // drops index for column `car_id`
        $this->dropIndex(
            'idx-options-car_id',
            'options'
        );

        $this->dropTable('options');
    }
}
