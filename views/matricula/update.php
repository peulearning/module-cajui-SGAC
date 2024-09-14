<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Matricula $model */

$this->title = 'Update Matricula: ' . $model->usuario_id;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuario_id, 'url' => ['view', 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="matricula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
