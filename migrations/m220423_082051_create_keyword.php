<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m220423_082051_create_keyword
 */
class m220423_082051_create_keyword extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Keyword', [
            'key_id' => Schema::TYPE_PK,
            'kek_name' => Schema::TYPE_STRING . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Keyword');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_082051_create_keyword cannot be reverted.\n";

        return false;
    }
    */
}
