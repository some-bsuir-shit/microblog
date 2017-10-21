<?php

use yii\db\Migration;

/**
 * Handles the creation of table `location`.
 * Has foreign keys to the tables:
 *
 * - `post`
 */
class m171021_112941_create_location_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('location', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'latitude' => $this->decimal(11, 8)->notNull(),
            'longitude' => $this->decimal(11, 8)->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-location-post_id',
            'location',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-location-post_id',
            'location',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-location-post_id',
            'location'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-location-post_id',
            'location'
        );

        $this->dropTable('location');
    }
}
