<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return '{{%usuario}}';
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
            [['login'], 'unique'], // Adicionando regra para login único
            [['email'], 'email'], // Validando formato de email
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
            'cpf' => 'CPF',
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

    // Métodos necessários da interface IdentityInterface
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Implementar se você estiver usando tokens de acesso
        return null; // Retornar null se não estiver implementado
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     * No-op since we are not using authKey.
     */
    public function getAuthKey()
    {
        return null; // Retorna null já que authKey não é usado
    }

    /**
     * {@inheritdoc}
     * No-op since we are not using authKey.
     */
    public function validateAuthKey($authKey)
    {
        return $authKey === null; // Validação sempre retorna true
    }

    public static function findByLogin($login)
    {
        return self::findOne(['login' => $login]);
    }

    public function validatePassword($password)
    {
        // Comparação simples sem hashing
        return $this->senha === $password; // Compare a senha fornecida com a senha armazenada
    }
}
