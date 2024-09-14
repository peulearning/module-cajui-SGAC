<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property int $curso_id
 * @property string|null $login
 * @property string|null $senha
 * @property string $nome
 * @property string|null $cpf
 * @property string|null $email
 * @property string|null $endereco
 *
 * @property Curso $curso
 * @property Curso[] $cursos
 * @property Matricula[] $matriculas
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curso_id', 'nome'], 'required'],
            [['curso_id'], 'integer'],
            [['login', 'senha', 'nome', 'cpf', 'email', 'endereco'], 'string', 'max' => 255],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['curso_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso_id' => 'Curso ID',
            'login' => 'Login',
            'senha' => 'Senha',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'email' => 'Email',
            'endereco' => 'Endereco',
        ];
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::class, ['id' => 'curso_id']);
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::class, ['id' => 'curso_id'])->viaTable('matricula', ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::class, ['usuario_id' => 'id']);
    }
}
