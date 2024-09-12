<?php

use yii\db\Migration;

/**
 * Class m240912_195526_matricula
 */
class m240912_195526_matricula extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('matricula', [
            'id' => $this->primaryKey(),
            '' => $this->
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240912_195526_matricula cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240912_195526_matricula cannot be reverted.\n";

        return false;
    }
    */
}
