<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sistema de Gerenciamento de Atividades Complementares';
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
