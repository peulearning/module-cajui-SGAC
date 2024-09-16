<?php

use app\models\Matricula;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\assets\AppAsset;
use yii\bootstrap5\Html as Html2;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

/** @var yii\web\View $this */
/** @var app\models\MatriculaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Matriculas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Matricula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuario_id',
            'curso_id',
            'data',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Matricula $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id]);
                 }
            ],
        ],
    ]); ?>


</div>
