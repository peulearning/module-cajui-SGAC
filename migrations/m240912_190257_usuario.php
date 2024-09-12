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

    public function up()
    {
        $this->createTable('usuario', [
            'id' => $this->primaryKey(),
            'login' => $this->string(),
            'senha' => $this->string(),
            'nome' => $this->string()->notNull(),
            'cpf' => $this->string(),
            'email' => $this->string(),
            'endereco' => $this->string()
        ]);
        $this->addForeignKey(name, tableName, columns, refTable, refColumns, delete, update)

        $this->addForeignKey(
            'fk-curso',
            'curso',
            curso_id,
            usuario,
            id
        );
    }

    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240912_190257_usuario cannot be reverted.\n";

        return false;
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
