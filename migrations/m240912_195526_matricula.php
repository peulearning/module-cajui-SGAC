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
            'usuario_id' => $this->primaryKey(),
            'curso_id' => $this->primaryKey(),
            'data' => $this->date(),

        ]);
        $this->addForeignKey('usuario_fk', 'matricula', 'usuario_id', 'usuario', 'id','RESTRICT');
        $this->addForeignKey('curso_fk', 'matricula', 'curso_id', 'curso', 'id', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('usuario_fk', 'matricula');
        $this->dropForeignKey('curso_fk', 'matricula');
        $this->dropTable('matricula');
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
