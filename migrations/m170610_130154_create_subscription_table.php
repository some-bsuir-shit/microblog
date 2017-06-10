<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscription`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `user`
 */
class m170610_130154_create_subscription_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('subscription', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'subscriber_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-subscription-user_id',
            'subscription',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-subscription-user_id',
            'subscription',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `subscriber_id`
        $this->createIndex(
            'idx-subscription-subscriber_id',
            'subscription',
            'subscriber_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-subscription-subscriber_id',
            'subscription',
            'subscriber_id',
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
            'fk-subscription-user_id',
            'subscription'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-subscription-user_id',
            'subscription'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-subscription-subscriber_id',
            'subscription'
        );

        // drops index for column `subscriber_id`
        $this->dropIndex(
            'idx-subscription-subscriber_id',
            'subscription'
        );

        $this->dropTable('subscription');
    }
}
