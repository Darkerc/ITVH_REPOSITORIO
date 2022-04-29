<?php

use yii\db\Migration;

/**
 * Class m220429_040550_encargado
 */
class m220429_040550_encargado extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('encargado', [
            'enc_id' => $this->primaryKey(),
            'enc_nombre' => $this->text(),
            'enc_apellidoMaterno' => $this->text(),
            'enc_apellidoPaterno' => $this->text(),
            'enc_fkdepartamento' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('encargado');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040550_encargado cannot be reverted.\n";

        return false;
    }
    */
}
