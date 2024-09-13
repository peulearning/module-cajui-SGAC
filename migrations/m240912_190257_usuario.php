<?php

use yii\db\Migration;

/**
 * Class m240912_190257_usuario
 */
class m240912_190257_usuario extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->createTable('usuario', [
            'id' => $this->primaryKey(),
            'curso_id' =>$this->integer()->notNull(),
            'login' => $this->string(),
            'senha' => $this->string(),
            'nome' => $this->string()->notNull(),
            'cpf' => $this->string(),
            'email' => $this->string(),
            'endereco' => $this->string()

        ]);


        $this->addForeignKey(
            'curso_fk',
            'usuario',
            'curso_id',
            'curso',
            'id',
            'RESTRICT'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('curso_fk', 'usuario');
        $this->dropTable('usuario');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240912_190257_usuario cannot be reverted.\n";

        return false;
    }
    */
}
