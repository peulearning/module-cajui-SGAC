<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RealizadaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="realizada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'usuario_id') ?>

    <?= $form->field($model, 'curso_id') ?>

    <?= $form->field($model, 'ac_id') ?>

    <?= $form->field($model, 'carga_horaria') ?>

    <?= $form->field($model, 'documento') ?>

    <?php // echo $form->field($model, 'descricao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
