<?php

use yii\db\Migration;

/**
 * Class m220429_035659_nivel
 */
class m220429_035659_nivel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('nivel', [
            'niv_id' => $this->primaryKey(),
            'niv_nombre' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('nivel');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035659_nivel cannot be reverted.\n";

        return false;
    }
    */
}
