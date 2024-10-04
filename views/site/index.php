<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Usuario;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->title = 'Sistema de Gerenciamento de Atividades Complementares';
?>

<style>
    /* ... (keep the existing styles) ... */

    /* Additional styles for student activities */
    .activity-item {
        margin-bottom: 20px;
    }
    .user-profile img {
        width: 100px;
        height: 100px;
        margin-bottom: 10px;
    }
    .activities-section {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .progress {
        height: 20px;
    }
    .progress-bar {
        line-height: 20px;
    }
</style>

<body class="sidebar-mini layout-fixed layout-navbar-fixed text-sm">
<div class="wrapper">
    <!-- ... (keep the existing navbar and sidebar code) ... -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid mt-3">
                <div class="site-index">
                    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                        <h1 class="display-4">Sistema do Cajuí de Atividades Complementares</h1>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="activities-section">
                                <h2>Lista de atividades complementares disponíveis</h2>

                                <?php
                                $activities = [
                                    ['name' => 'Instrutor em cursos, minicursos ou oficinas', 'progress' => 70],
                                    ['name' => 'Monitoria reconhecida pelo IFMG', 'progress' => 40],
                                    ['name' => 'Participação em órgãos colegiados', 'progress' => 20],
                                    ['name' => 'Participação em projetos de pesquisa', 'progress' => 60],
                                    ['name' => 'Participação em projetos de extensão', 'progress' => 80],
                                ];

                                foreach ($activities as $activity): ?>
                                    <div class="activity-item">
                                        <p><?= Html::encode($activity['name']) ?></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                 style="width: <?= $activity['progress'] ?>%;"
                                                 aria-valuenow="<?= $activity['progress'] ?>"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <?= $activity['progress'] ?>%
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="activities-section">
                                <div class="user-profile text-center">
                                    <img src="http://cajui.ifnmg.edu.br/arquivo/avatar/70/be2c25fb-feb8-470c-99f5-57e684dc99dd.png" alt="User Avatar" class="img-circle">
                                    <h3>Pedro Ribeiro</h3>
                                    <p>Matrícula: 12739</p>
                                </div>

                                <h4>Progresso total de atividade complementar</h4>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar"
                                         style="width: 60%;"
                                         aria-valuenow="60"
                                         aria-valuemin="0"
                                         aria-valuemax="100">
                                        60%
                                    </div>
                                </div>

                                <h4 class="mt-4">Cadastro de atividade complementar</h4>
                                <?= Html::a('Cadastrar atividade complementar', ['activity/create'], ['class' => 'btn btn-primary btn-block']) ?>
                                <?= Html::a('Pendentes', ['activity/pending'], ['class' => 'btn btn-warning btn-block']) ?>
                                <?= Html::a('Concluídas', ['activity/completed'], ['class' => 'btn btn-success btn-block']) ?>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="activities-section mt-4">
                        <h2>Todas as Atividades</h2>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'nome',
                                [
                                    'attribute' => 'cursos',
                                    'label' => 'Curso',
                                    'value' => 'curso.nome'
                                ],
                                [
                                    'attribute' => 'acs',
                                    'label' => 'AC',
                                    'value' => 'curso.ac.nome'
                                ],
                                [
                                    'attribute' => 'acs',
                                    'label' => 'Data de cadastro',
                                    'value' => 'acs.cadastro'
                                ],
                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]) ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</body>