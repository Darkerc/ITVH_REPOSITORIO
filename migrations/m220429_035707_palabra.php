<?php

use yii\db\Migration;

/**
 * Class m220429_035707_palabra
 */
class m220429_035707_palabra extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('palabra', [
            'pal_id' => $this->primaryKey(),
            'pal_nombre' => $this->text(),
            'pal_fkrecurso' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('palabra');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220429_035707_palabra cannot be reverted.\n";

        return false;
    }
    */
}
