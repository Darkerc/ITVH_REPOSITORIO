<?php

use yii\db\Migration;

/**
 * Class m220429_040515_recurso_carrera
 */
class m220429_040515_recurso_carrera extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('recurso_carrera', [
            'recc_id' => $this->primaryKey(),
            'recc_fkrecurso' => $this->integer(),
            'recc_fkcarrera' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('recurso_carrera');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040515_recurso_carrera cannot be reverted.\n";

        return false;
    }
    */
}
