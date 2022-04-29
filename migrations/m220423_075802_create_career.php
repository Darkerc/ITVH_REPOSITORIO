<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220423_075802_create_news_career
 */
class m220423_075802_create_career extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('CAREER', [
            'car_id' => Schema::TYPE_PK,
            'car_name' => Schema::TYPE_STRING . ' NOT NULL',
            'createdAt' => Schema::TYPE_DATETIME,
            'updatedAt' => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('CAREER');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220423_075802_create_news_career cannot be reverted.\n";

        return false;
    }
    */
}
