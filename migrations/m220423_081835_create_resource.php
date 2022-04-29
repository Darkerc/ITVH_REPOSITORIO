<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_081835_create_resource
 */
class m220423_081835_create_resource extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Resource', [
            'res_id' => Schema::TYPE_PK,
            'res_name' => Schema::TYPE_STRING . ' NOT NULL',
            'res_resume' => Schema::TYPE_STRING . ' NOT NULL',
            'res_fk_type' => Schema::TYPE_INTEGER . ' NOT NULL',
            'res_fk_career' => Schema::TYPE_INTEGER . ' NOT NULL',
            'res_fk_autor' => Schema::TYPE_INTEGER . ' NOT NULL',
            'res_fk_level' => Schema::TYPE_INTEGER . ' NOT NULL',
            'res_fk_publishAt' => Schema::TYPE_DATETIME . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Resource');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_081835_create_resource cannot be reverted.\n";

        return false;
    }
    */
}
