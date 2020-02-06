<?php

use yii\db\Migration;

/**
 * Handles the creation of table `characteristic`.
 * Has foreign keys to the tables:
 *
 * - `car`
 */
class m200203_064137_create_characteristic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('characteristic', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer()->notNull(),
            'model' => $this->string(),
            'year' => $this->integer(),
            'carcase' => $this->string(),
            'mileage' => $this->integer(),
        ]);

        // creates index for column `car_id`
        $this->createIndex(
            'idx-characteristic-car_id',
            'characteristic',
            'car_id'
        );

        // add foreign key for table `car`
        $this->addForeignKey(
            'fk-characteristic-car_id',
            'characteristic',
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
            'fk-characteristic-car_id',
            'characteristic'
        );

        // drops index for column `car_id`
        $this->dropIndex(
            'idx-characteristic-car_id',
            'characteristic'
        );

        $this->dropTable('characteristic');
    }
}
