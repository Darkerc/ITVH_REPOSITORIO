<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_081757_create_resource_file
 */
class m220423_081757_create_resource_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Resource_File', [
            'resf_id' => Schema::TYPE_PK,
            'resf_fk_file' => Schema::TYPE_INTEGER . ' NOT NULL',
            'resf_fk_resource' => Schema::TYPE_INTEGER . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Resource_File');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_081757_create_resource_file cannot be reverted.\n";

        return false;
    }
    */
}
