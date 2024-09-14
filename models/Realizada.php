<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "realizada".
 *
 * @property int $usuario_id
 * @property int $curso_id
 * @property int $ac_id
 * @property float|null $carga_horaria
 * @property string $documento
 * @property string|null $descricao
 *
 * @property Curso $curso
 * @property Usuario $usuario
 */
class Realizada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'realizada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'curso_id', 'ac_id', 'documento'], 'required'],
            [['usuario_id', 'curso_id', 'ac_id'], 'integer'],
            [['carga_horaria'], 'number'],
            [['documento', 'descricao'], 'string', 'max' => 255],
            [['usuario_id', 'curso_id', 'ac_id'], 'unique', 'targetAttribute' => ['usuario_id', 'curso_id', 'ac_id']],
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
            'ac_id' => 'Ac ID',
            'carga_horaria' => 'Carga Horaria',
            'documento' => 'Documento',
            'descricao' => 'Descricao',
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
