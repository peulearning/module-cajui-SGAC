<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\assets\AppAsset;
use yii\bootstrap5\Html as Html2;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
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
    </header> 
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<style>
    body {
        background-color: #f0f0f0; /* Cor de fundo cinza */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Ocupa toda a altura da viewport */
    }

    .login-container {
        background-color: white; /* Cor de fundo branco para o formulário */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        max-width: 400px;
        width: 100%;
        margin: auto; /* Para centralizar horizontalmente */
    }

    .logo {
        text-align: center;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .logo img {
        height: 50px;
    }

    .form-control {
        margin-bottom: 10px;
    }

    .login-button, .gov-button {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }

    .login-button {
        background-color: #007bff;
        color: white;
    }

    .gov-button {
        background-color: #28a745;
        color: white;
    }

    .links {
        text-align: center;
        margin-top: 15px;
    }

    .links a {
        color: #007bff;
        text-decoration: none;
    }
</style>

<div class="container">
    <div class="login-container">
        <div class="logo">
            <img src="<?= Yii::$app->request->baseUrl ?>/assets/img/ifnmg.png" alt="IFNMG Logo">
            <img src="<?= Yii::$app->request->baseUrl ?>/assets/img/cajui.png" alt="Cajuí Logo">
        </div>
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'form'],
        ]); ?>

        <?= $form->field($model, 'login')->textInput(['placeholder' => 'Usuário'])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Senha'])->label(false) ?>

        <div class="form-group">
            <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'form-check-input'])->label('Permanecer Conectado', ['class' => 'form-check-label']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Acessar', ['class' => 'login-button']) ?>
        </div>

        <?= Html::button('Entrar com o GOV.BR', ['class' => 'gov-button']) ?>

        <div class="links">
            <?= Html::a('Alterar Senha', ['site/request-password-reset']) ?> |
            <?= Html::a('Recuperar Senha', ['site/request-password-reset']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php $this->endContent(); ?>
