<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment_like`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `comment`
 */
class m171021_113657_create_comment_like_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment_like', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'comment_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-comment_like-user_id',
            'comment_like',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comment_like-user_id',
            'comment_like',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `comment_id`
        $this->createIndex(
            'idx-comment_like-comment_id',
            'comment_like',
            'comment_id'
        );

        // add foreign key for table `comment`
        $this->addForeignKey(
            'fk-comment_like-comment_id',
            'comment_like',
            'comment_id',
            'comment',
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
            'fk-comment_like-user_id',
            'comment_like'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-comment_like-user_id',
            'comment_like'
        );

        // drops foreign key for table `comment`
        $this->dropForeignKey(
            'fk-comment_like-comment_id',
            'comment_like'
        );

        // drops index for column `comment_id`
        $this->dropIndex(
            'idx-comment_like-comment_id',
            'comment_like'
        );

        $this->dropTable('comment_like');
    }
}
