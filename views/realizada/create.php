<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Realizada $model */

$this->title = 'Create Realizada';
$this->params['breadcrumbs'][] = ['label' => 'Realizadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realizada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
