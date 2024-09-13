<?php

use yii\db\Migration;

/**
 * Class m240912_191118_curso
 */
class m240912_191118_curso extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('curso', [
            'id' => $this->primaryKey(),
            'ac_id' => $this->integer(),
            'nome' => $this->string(),
            'area' => $this->string(),
            'carga_horaria' => $this->double(),
        ]);

        $this->addForeignKey('ac_fk', 'curso', 'ac_id', 'ac', 'id','RESTRICT');
    }




    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropForeignKey('ac_fk','ac');
       $this->dropTable('curso');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240912_191118_curso cannot be reverted.\n";

        return false;
    }
    */
}
