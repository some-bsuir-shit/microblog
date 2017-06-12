<?php

use yii\db\Migration;

/**
 * Handles the creation of table `notification`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170611_115202_create_notification_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('notification', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'text' => $this->text(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-notification-user_id',
            'notification',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-notification-user_id',
            'notification',
            'user_id',
            'user',
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
            'fk-notification-user_id',
            'notification'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-notification-user_id',
            'notification'
        );

        $this->dropTable('notification');
    }
}
