<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document`.
 * Has foreign keys to the tables:
 *
 * - `post`
 */
class m170611_114954_create_document_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'post_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-document-post_id',
            'document',
            'post_id'
        );

        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-document-post_id',
            'document',
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
            'fk-document-post_id',
            'document'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-document-post_id',
            'document'
        );

        $this->dropTable('document');
    }
}
