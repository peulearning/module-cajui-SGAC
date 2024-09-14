<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%usuario}}`.
 */
class m240914_173150_create_usuario_table extends Migration
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

}
