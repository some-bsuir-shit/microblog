<?php

use yii\db\Migration;

/**
 * Handles the creation of table `like`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `post`
 */
class m171021_112030_create_like_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('like', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-like-user_id',
            'like',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-like-user_id',
            'like',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `post_id`
        $this->createIndex(
            'idx-like-post_id',
            'like',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-like-post_id',
            'like',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-like-user_id',
            'like'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-like-user_id',
            'like'
        );

        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-like-post_id',
            'like'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-like-post_id',
            'like'
        );

        $this->dropTable('like');
    }
}
