<?php

use yii\db\Migration;

/**
 * Handles the creation of table `language`.
 */
class m170610_120222_create_language_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('language', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('language');
    }
}
