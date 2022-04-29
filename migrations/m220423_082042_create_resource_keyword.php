<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_082042_create_resource_keyword
 */
class m220423_082042_create_resource_keyword extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Resource_Keyword', [
            'resk_id' => Schema::TYPE_PK,
            'resk_fk_resource' => Schema::TYPE_INTEGER . ' NOT NULL',
            'resk_fk_keyword' => Schema::TYPE_INTEGER . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Resource_Keyword');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_082042_create_resource_keyword cannot be reverted.\n";

        return false;
    }
    */
}
