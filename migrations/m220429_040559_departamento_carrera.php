<?php

use yii\db\Migration;

/**
 * Class m220429_040559_departamento_carrera
 */
class m220429_040559_departamento_carrera extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('departamento_carrera', [
            'depc_id' => $this->primaryKey(),
            'depc_fkdepartamento' => $this->integer(),
            'depc_fkcarrera' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('departamento_carrera');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040559_departamento_carrera cannot be reverted.\n";

        return false;
    }
    */
}
