<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 * Has foreign keys to the tables:
 *
 * - `post`
 */
class m171021_113255_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-tag-post_id',
            'tag',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-tag-post_id',
            'tag',
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
            'fk-tag-post_id',
            'tag'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-tag-post_id',
            'tag'
        );

        $this->dropTable('tag');
    }
}
