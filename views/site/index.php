<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap5\Html as Html2;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->title = 'Sistema de Gerenciamento de Atividades Complementares';
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
                    . Html2::beginForm(['/site/logout'])
                    . Html2::submitButton(
                        'Logout (' . Yii::$app->user->identity->nome . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html2::endForm()
                    . '</li>'
        ]
    ]);


    NavBar::end();
    ?>
    
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"> Sistema do Cajuí </h1>

        <p>
            <?= Html::beginForm(['ac/'], 'post')
                . Html::submitButton('Atividades Complementares', ['class' => 'btn btn-primary'])
                . Html::endForm() ?>
        </p>

        <p>
            <?= Html::beginForm(['curso/'], 'post')
                . Html::submitButton('Cursos Cadastrados', ['class' => 'btn btn-primary'])
                . Html::endForm() ?>
        </p>

        <p>
            <?= Html::beginForm(['usuario/'], 'post')
                . Html::submitButton('Usuários Cadastrados', ['class' => 'btn btn-primary'])
                . Html::endForm() ?>
        </p>

        <p>
            <?= Html::beginForm(['matricula/'], 'post')
                . Html::submitButton('Matriculas Cadastradas', ['class' => 'btn btn-primary'])
                . Html::endForm() ?>
        </p>

        <p>
            <?= Html::beginForm(['realizada/'], 'post')
                . Html::submitButton('AComplementares Cadastradas', ['class' => 'btn btn-primary'])
                . Html::endForm() ?>
        </p>

        <!-- Adicionando o botão de logout -->
        <p>
            <?= Html::beginForm(['site/logout/'], 'post')
                . Html::submitButton('Logout', ['class' => 'btn btn-danger'])
                . Html::endForm() ?>
        </p>

    </div>
</div>
