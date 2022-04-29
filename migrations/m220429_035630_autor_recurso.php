<?php

use yii\db\Migration;

/**
 * Class m220429_035630_autor_recurso
 */
class m220429_035630_autor_recurso extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('autor_recurso', [
            'autr_id' => $this->primaryKey(),
            'autr_fkrecurso' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('autor_recurso');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035630_autor_recurso cannot be reverted.\n";

        return false;
    }
    */
}
