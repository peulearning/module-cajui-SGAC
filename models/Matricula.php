<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matricula".
 *
 * @property int $usuario_id
 * @property int $curso_id
 * @property string|null $data
 *
 * @property Curso $curso
 * @property Usuario $usuario
 */
class Matricula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matricula';
    }
3
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'curso_id'], 'required'],
            [['usuario_id', 'curso_id'], 'integer'],
            [['data'], 'safe'],
            [['usuario_id', 'curso_id'], 'unique', 'targetAttribute' => ['usuario_id', 'curso_id']],
            [['curso_id'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['curso_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Usuario ID',
            'curso_id' => 'Curso ID',
            'data' => 'Data',
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
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::class, ['id' => 'usuario_id']);
    }
}
