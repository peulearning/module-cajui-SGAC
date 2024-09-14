<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Usuario;
use app\models\Curso;

/** @var yii\web\View $this */
/** @var app\models\Matricula $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="matricula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuario_id')->dropDownList(Usuario::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Selecione o Usuário']) ?>

    <?= $form->field($model, 'curso_id')->dropDownList(Curso::find()->select(['nome', 'id'])->indexBy('id')->column(), ['prompt' => 'Selecione o Curso']) ?>

    <?= $form->field($model, 'data')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
