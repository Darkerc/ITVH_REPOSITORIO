<?php

use yii\db\Migration;

/**
 * Class m220429_040540_departamento
 */
class m220429_040540_departamento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('departamento', [
            'dep_id' => $this->primaryKey(),
            'dep_nombre' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('departamento');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040540_departamento cannot be reverted.\n";

        return false;
    }
    */
}
