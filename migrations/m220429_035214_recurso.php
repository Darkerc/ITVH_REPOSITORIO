<?php

use yii\db\Migration;

/**
 * Class m220429_035214_recurso
 */
class m220429_035214_recurso extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('recurso', [
            'rec_id' => $this->primaryKey(),
            'rec_nombre' => $this->text(),
            'rec_resumen' => $this->text(),
            'rec_fktipo' => $this->integer(),
            'rec_fknivel' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('recurso');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035214_recurso cannot be reverted.\n";

        return false;
    }
    */
}
