<?php

use app\models\Realizada;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RealizadaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Realizadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="realizada-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Realizada', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usuario_id',
            'curso_id',
            'ac_id',
            'carga_horaria',
            'documento',
            //'descricao',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Realizada $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id, 'ac_id' => $model->ac_id]);
                 }
            ],
        ],
    ]); ?>


</div>
