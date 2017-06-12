<?php

use yii\db\Migration;

/**
 * Handles the creation of table `video`.
 * Has foreign keys to the tables:
 *
 * - `post`
 */
class m170611_115020_create_video_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('video', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-video-post_id',
            'video',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-video-post_id',
            'video',
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
            'fk-video-post_id',
            'video'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-video-post_id',
            'video'
        );

        $this->dropTable('video');
    }
}
