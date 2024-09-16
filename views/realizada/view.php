<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\assets\AppAsset;
use yii\bootstrap5\Html as Html2;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

/** @var yii\web\View $this */
/** @var app\models\Realizada $model */

$this->title = $model->usuario_id;
$this->params['breadcrumbs'][] = ['label' => 'Realizadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="realizada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id, 'ac_id' => $model->ac_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id, 'ac_id' => $model->ac_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'usuario_id',
            'curso_id',
            'ac_id',
            'carga_horaria',
            'documento',
            'descricao',
        ],
    ]) ?>

</div>
