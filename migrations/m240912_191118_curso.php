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
            'ac' => $this->int(),
            'nome' => $this->string(),
            'area' => $this->string(),
            'carga_horaria' => $this->double(),
            'curso_id' => $this->int()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240912_191118_curso cannot be reverted.\n";

        return false;
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
