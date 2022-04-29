<?php

use yii\db\Migration;

/**
 * Class m220429_035344_autor
 */
class m220429_035344_autor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('autor', [
            'aut_id' => $this->primaryKey(),
            'aut_nombre' => $this->text(),
            'aut_apellidoMaterno' => $this->text(),
            'aut_apellidoPaterno' => $this->text(),
            'aut_correo' => $this->text(),
            'aut_semestre' => $this->integer(),
            'aut_fkcarrera' => $this->integer(),
            'aut_fktipo' => $this->integer(),
            'aut_fkdepartamento' => $this->integer(),
            'aut_fkencargado' => $this->integer(),
            'aut_fkuser' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('autor');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035344_autor cannot be reverted.\n";

        return false;
    }
    */
}
