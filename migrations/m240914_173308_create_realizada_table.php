<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%realizada}}`.
 */
class m240914_173308_create_realizada_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('realizada', [
            'usuario_id' => $this->integer()->notNull(),
            'curso_id' => $this->integer()->notNull(),
            'ac_id' => $this->integer()->notNull(), // AUTO_INCREMENT já é implícito com primaryKey
            'carga_horaria' => $this->double(),
            'documento' => $this->string(255)->notNull(),
            'descricao' => $this->string(255),
        ]);

        // Defina a chave primária composta, se necessário (sem AUTO_INCREMENT)
        $this->addPrimaryKey('pk_realizada', 'realizada', ['usuario_id', 'curso_id','ac_id']);

        // Adicione as chaves estrangeiras, se necessário
        $this->addForeignKey('fk_usuario_realizada', 'realizada', 'usuario_id', 'usuario', 'id', 'CASCADE');
        $this->addForeignKey('fk_curso_realizada', 'realizada', 'curso_id', 'curso', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remover as chaves estrangeiras usando os nomes corretos
        $this->dropForeignKey('fk_usuario_realizada', 'realizada');
        $this->dropForeignKey('fk_curso_realizada', 'realizada');

        // Remover a chave primária composta
        $this->dropPrimaryKey('pk_realizada', 'realizada', 'ac_id');

        // Remover a tabela
        $this->dropTable('realizada');
    }
}
