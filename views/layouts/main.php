<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

 <?php 
  NavBar::begin(['brandLabel' => 'NavBar Test']);
  echo Nav::widget([
      'items' => [
          ['label' => 'Home', 'url' => ['/site/index']],
          ['label' => 'About', 'url' => ['/site/about']],
      ],
      'options' => ['class' => 'navbar-nav'],
  ]);
  NavBar::end();
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
<!-- Removido o cabeçalho (navbar) -->

<main role="main" class="flex-shrink-0">
    <?= $content ?>
</main>

<style>
  #footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: transparent;
    color: rgba(0, 0, 0, 0.6); /* Ajuste a cor e a opacidade conforme necessário */
    z-index: 1000;
    border-top: 1px solid rgba(0, 0, 0, 0.1); /* Adiciona uma borda sutil para separar o rodapé do conteúdo */
  }

  .container {
    max-width: 100%;
    padding-left: 15px;
    padding-right: 15px;
  }

  .row {
    margin-left: 0;
    margin-right: 0;
  }

  body {
    margin: 0;
    padding: 0;
  }

  main {
    flex: 1;
    padding-bottom: 60px; /* Ajuste conforme a altura do rodapé */
  }
</style>

<footer id="footer" class="py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-4 text-center text-md-start">
                &copy; Gerência de Projetos IFNMG <?= date('Y') ?>
            </div>
            <div class="col-md-4 text-center text-md-start">
                Versão 0.0.1 &nbsp;|&nbsp; Copyright © 2015 IFNMG. Todos direitos reservados
            </div>
            <div class="col-md-4 text-center text-md-end">
                <?= Yii::powered() ?>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
