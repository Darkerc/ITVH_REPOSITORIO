<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_081700_create_news_resource_type
 */
class m220423_081700_create_resource_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Resource_Type', [
            'rest_id' => Schema::TYPE_PK,
            'rest_name' => Schema::TYPE_STRING . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Resource_Type');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_081700_create_news_resource_type cannot be reverted.\n";

        return false;
    }
    */
}
