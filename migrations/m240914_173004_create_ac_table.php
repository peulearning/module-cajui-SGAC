<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ac}}`.
 */
class m240914_173004_create_ac_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ac', [
            'id' => $this->primaryKey(),
            'nome'=> $this->string(),
            'descricao' => $this->text(),
            'carga_horaria' => $this->double(),
            'quantidade' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('ac');
    }
}
