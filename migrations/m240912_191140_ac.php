<?php

use yii\db\Migration;

/**
 * Class m240912_191140_ac
 */
class m240912_191140_ac extends Migration
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
            'quantidade' => $this->int()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240912_191140_ac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240912_191140_ac cannot be reverted.\n";

        return false;
    }
    */
}
