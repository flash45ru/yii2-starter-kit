<?php

use yii\db\Migration;

/**
 * Handles the creation of table `photo`.
 * Has foreign keys to the tables:
 *
 * - `advent`
 */
class m200203_061945_create_photo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('photo', [
            'id' => $this->primaryKey(),
            'advent_id' => $this->integer()->notNull(),
            'file' => $this->string(),
        ]);

        // creates index for column `advent_id`
        $this->createIndex(
            'idx-photo-advent_id',
            'photo',
            'advent_id'
        );

        // add foreign key for table `advent`
        $this->addForeignKey(
            'fk-photo-advent_id',
            'photo',
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
            'fk-photo-advent_id',
            'photo'
        );

        // drops index for column `advent_id`
        $this->dropIndex(
            'idx-photo-advent_id',
            'photo'
        );

        $this->dropTable('photo');
    }
}
