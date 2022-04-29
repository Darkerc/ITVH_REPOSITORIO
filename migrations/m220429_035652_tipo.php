<?php

use yii\db\Migration;

/**
 * Class m220429_035652_tipo
 */
class m220429_035652_tipo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tipo', [
            'tip_id' => $this->primaryKey(),
            'tip_nombre' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tipo');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035652_tipo cannot be reverted.\n";

        return false;
    }
    */
}
