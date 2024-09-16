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
/** @var app\models\Matricula $model */

$this->title = $model->usuario_id;
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
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
<div class="matricula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'usuario_id' => $model->usuario_id, 'curso_id' => $model->curso_id], [
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
            'data',
        ],
    ]) ?>

</div>
