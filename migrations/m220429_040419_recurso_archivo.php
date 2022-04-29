<?php

use yii\db\Migration;

/**
 * Class m220429_040419_recurso_archivo
 */
class m220429_040419_recurso_archivo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('recurso_archivo', [
            'reca_id' => $this->primaryKey(),
            'reca_fkarchivo' => $this->integer(),
            'reca_fkrecursos' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('recurso_archivo');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040419_recurso_archivo cannot be reverted.\n";

        return false;
    }
    */
}
