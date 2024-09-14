<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Usuario;
use app\models\Curso;
use app\models\Ac;

/** @var yii\web\View $this */
/** @var app\models\Realizada $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="realizada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario_id')->dropDownList(
        Usuario::find()->select(['nome', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Selecione o Usuário']
    ) ?>

    <?= $form->field($model, 'curso_id')->dropDownList(
        Curso::find()->select(['nome', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Selecione o Curso']
    ) ?>

    <?= $form->field($model, 'ac_id')->dropDownList(
        Ac::find()->select(['nome', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Selecione a Atividade Complementar']
    ) ?>

    <?= $form->field($model, 'carga_horaria')->textInput(['type' => 'number', 'step' => '0.01']) ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
