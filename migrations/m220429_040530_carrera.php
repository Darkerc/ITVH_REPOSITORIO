<?php

use yii\db\Migration;

/**
 * Class m220429_040530_carrera
 */
class m220429_040530_carrera extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('carrera', [
            'car_id' => $this->primaryKey(),
            'car_nombre' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('carrera');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_040530_carrera cannot be reverted.\n";

        return false;
    }
    */
}
