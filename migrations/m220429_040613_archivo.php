<?php

use yii\db\Migration;

/**
 * Class m220429_040613_archivo
 */
class m220429_040613_archivo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('archivo', [
            'arc_id' => $this->primaryKey(),
            'arc_nombre' => $this->text(),
            'arc_extencion' => $this->text(),
            'arc_nombreOri' => $this->text(),
            'arc_visitas' => $this->integer(),
            'arc_descargas' => $this->integer(),
            'arc_mimetype' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('archivo');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040613_archivo cannot be reverted.\n";

        return false;
    }
    */
}
