<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 * Has foreign keys to the tables:
 *
 * - `city`
 */
class m170610_130020_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'first_name' => $this->string()->notNull(),
            'last_name' => $this->string()->notNull(),
            'birth_data' => $this->dateTime(),
            'city_id' => $this->integer()->notNull(),
            'email' => $this->string(),
            'about_me' => $this->text(),
        ]);

        // creates index for column `city_id`
        $this->createIndex(
            'idx-user-city_id',
            'user',
            'city_id'
        );

        // add foreign key for table `city`
        $this->addForeignKey(
            'fk-user-city_id',
            'user',
            'city_id',
            'city',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `city`
        $this->dropForeignKey(
            'fk-user-city_id',
            'user'
        );

        // drops index for column `city_id`
        $this->dropIndex(
            'idx-user-city_id',
            'user'
        );

        $this->dropTable('user');
    }
}
