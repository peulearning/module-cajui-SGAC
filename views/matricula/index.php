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
<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => "SGAC",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-light navbar-expand-lg bg-gradient bg-warning']
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        
        'items' => [
            ['label' => 'ac', 'url' => ['/ac']],
            ['label' => 'curso', 'url' => ['/curso']],
            ['label' => 'matricula', 'url' => ['/matricula']],
            ['label' => 'realizada', 'url' => ['/realizada']],
            ['label' => 'usuario', 'url' => ['/usuario']],
        
            Yii::$app->user->isGuest
                ? ['label' => 'Log in', 'url' => ['/site/login']]
                : '<li class="nav-item ">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->nome . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);


    NavBar::end();
    ?>
    </header> 
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
