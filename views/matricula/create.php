<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Matricula $model */

$this->title = 'Create Matricula';
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
