<?php

use yii\db\Migration;

/**
 * Class m220429_040404_bitacora
 */
class m220429_040404_bitacora extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('bitacora', [
            'bit_id' => $this->primaryKey(),
            'bit_descripcion' => $this->text(),
            'bit_fkrecurso' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bitacora');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040404_bitacora cannot be reverted.\n";

        return false;
    }
    */
}
