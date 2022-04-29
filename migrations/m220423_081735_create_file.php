<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_081735_create_file
 */
class m220423_081735_create_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('File', [
            'fil_id' => Schema::TYPE_PK,
            'fil_url' => Schema::TYPE_STRING . ' NOT NULL',
            'fil_extencion' => Schema::TYPE_STRING . ' NOT NULL',
            'fil_original_name' => Schema::TYPE_STRING . ' NOT NULL',
            'fil_path' => Schema::TYPE_STRING . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('File');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_081735_create_file cannot be reverted.\n";

        return false;
    }
    */
}
