<?php

use yii\db\Migration;

/**
 * Class m220429_035557_autor_tipo
 */
class m220429_035557_autor_tipo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('autor_tipo', [
            'autt_id' => $this->primaryKey(),
            'autt_nombre' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('autor_tipo');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035557_autor_tipo cannot be reverted.\n";

        return false;
    }
    */
}
