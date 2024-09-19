<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Usuario;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->title = 'Sistema de Gerenciamento de Atividades Complementares';
?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"> Sistema do Cajuí de Atividades Complementares </h1>
 <!--
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


        <p>
            <?= Html::beginForm(['site/logout/'], 'post')
                . Html::submitButton('Logout', ['class' => 'btn btn-danger'])
                . Html::endForm() ?>
       </p> -->

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        ///'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             // 'id',
            // 'curso_id',
            // 'login',
            // 'senha',
            'nome',
            //'cpf',
            //'email:email',
            //'endereco',
            [
                'attribute' => 'cursos',
                'label' => 'Curso',
                //'format' => 'raw',
                //'options' => ['style' => 'width:15%;'],
                'value' => 'curso.nome'
            ],
            [
                'attribute' => 'acs',
                'label' => 'AC',
                //'format' => 'raw',
                //'options' => ['style' => 'width:15%;'],
                'value' => 'curso.ac.nome'
            ],
            [
                'attribute' => 'acs',
                'label' => 'Carga Horaria',
                //'format' => 'raw',
                //'options' => ['style' => 'width:15%;'],
                'value' => 'curso.ac.carga_horaria',

            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Usuario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    </div>
</div>
