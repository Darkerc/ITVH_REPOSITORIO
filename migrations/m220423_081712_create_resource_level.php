<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_081712_create_news_resource_level
 */
class m220423_081712_create_resource_level extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Resource_Level', [
            'resl_id' => Schema::TYPE_PK,
            'resl_name' => Schema::TYPE_STRING . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Resource_Level');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_081712_create_news_resource_level cannot be reverted.\n";

        return false;
    }
    */
}
