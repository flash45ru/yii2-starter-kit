<?php

use yii\db\Migration;

/**
 * Handles the creation of table `car`.
 * Has foreign keys to the tables:
 *
 * - `advent`
 */
class m200203_064126_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'advent_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `advent_id`
        $this->createIndex(
            'idx-car-advent_id',
            'car',
            'advent_id'
        );

        // add foreign key for table `advent`
        $this->addForeignKey(
            'fk-car-advent_id',
            'car',
            'advent_id',
            'advent',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `advent`
        $this->dropForeignKey(
            'fk-car-advent_id',
            'car'
        );

        // drops index for column `advent_id`
        $this->dropIndex(
            'idx-car-advent_id',
            'car'
        );

        $this->dropTable('car');
    }
}
