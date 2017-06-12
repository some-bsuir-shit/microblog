<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 * Has foreign keys to the tables:
 *
 * - `post`
 */
class m170611_115057_create_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'author' => $this->string(),
            'url' => $this->string()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-image-post_id',
            'image',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-image-post_id',
            'image',
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
            'fk-image-post_id',
            'image'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-image-post_id',
            'image'
        );

        $this->dropTable('image');
    }
}
