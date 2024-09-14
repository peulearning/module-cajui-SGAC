<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sistema de Gerenciamento de Atividades Complementares';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"> Sistema do Cajuí </h1>

        <!-- Adicionando o botão de logout -->
        <p>
            <?= Html::beginForm(['site/logout'], 'post')
                . Html::submitButton('Logout', ['class' => 'btn btn-danger'])
                . Html::endForm() ?>
        </p>

    </div>
</div>
