<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ac $model */

$this->title = 'Create Ac';
$this->params['breadcrumbs'][] = ['label' => 'Acs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ac-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
