<?php

use yii\db\Migration;

/**
 * Class m240912_195449_realizada
 */
class m240912_195449_realizada extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('realizada', [
            'usuario_id' => $this->primaryKey(),
            'curso_id' => $this->primaryKey(),
            'ac_id' => $this->primaryKey(),
            'carga_horaria' => $this->double(),
            'documento' => $this->string()->notNull(),
            'descricao' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk_usuario_id',
            'realizada',
            'usuario_id',
            'usuario',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_curso_id',
            'realizada',
            'curso_id',
            'curso',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_ac_id',
            'realizada',
            'ac_id',
            'ac',
            'id',
            'RESTRICT'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_usuario_id', 'realizada');
        $this->dropForeignKey('fk_curso_id', 'realizada');
        $this->dropForeignKey('fk_ac_id', 'realizada');
        $this->dropTable('realizada');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240912_195449_realizada cannot be reverted.\n";

        return false;
    }
    */
}
