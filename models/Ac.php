<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ac".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $descricao
 * @property float|null $carga_horaria
 * @property int|null $quantidade
 *
 * @property Curso[] $cursos
 */
class Ac extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ac';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'string'],
            [['carga_horaria'], 'number'],
            [['quantidade'], 'integer'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descricao',
            'carga_horaria' => 'Carga Horaria',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::class, ['ac_id' => 'id']);
    }
}
