<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property int|null $ac_id
 * @property string|null $nome
 * @property string|null $area
 * @property float|null $carga_horaria
 *
 * @property Ac $ac
 * @property Matricula[] $matriculas
 * @property Usuario[] $usuarios
 * @property Usuario[] $usuarios0
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ac_id'], 'integer'],
            [['carga_horaria'], 'number'],
            [['nome', 'area'], 'string', 'max' => 255],
            [['ac_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ac::class, 'targetAttribute' => ['ac_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ac_id' => 'Ac ID',
            'nome' => 'Nome',
            'area' => 'Area',
            'carga_horaria' => 'Carga Horaria',
        ];
    }

    /**
     * Gets query for [[Ac]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAc()
    {
        return $this->hasOne(Ac::class, ['id' => 'ac_id']);
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::class, ['curso_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::class, ['curso_id' => 'id']);
    }

    /**
     * Gets query for [[Usuarios0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios0()
    {
        return $this->hasMany(Usuario::class, ['id' => 'usuario_id'])->viaTable('matricula', ['curso_id' => 'id']);
    }
}
