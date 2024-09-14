<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%matricula}}`.
 */
class m240914_173237_create_matricula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
        public function safeUp()
    {
        $this->createTable('matricula', [
            'usuario_id' => $this->integer()->notNull(),
            'curso_id' => $this->integer()->notNull(),
            'data' => $this->date(),
        ]);

        $this->addPrimaryKey('pk_matricula', 'matricula', ['usuario_id', 'curso_id']);

        // Renomeie as foreign keys para evitar conflito
        $this->addForeignKey('fk_usuario_matricula', 'matricula', 'usuario_id', 'usuario', 'id', 'RESTRICT');
        $this->addForeignKey('fk_curso_matricula', 'matricula', 'curso_id', 'curso', 'id', 'RESTRICT');
    }

         public function safeDown()
    {
        $this->dropForeignKey('fk_usuario_matricula', 'matricula');
        $this->dropForeignKey('fk_curso_matricula', 'matricula');
        $this->dropTable('matricula');
    }

}