<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%curso}}`.
 */
class m240914_173113_create_curso_table extends Migration
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

}
