<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => '<img src="/cometido/web/images/logo.jpg" width="50" height="50" alt="Home"> Sistema de Cometidos',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto text-right font-weight-bold'],
            'items' => [

                ['label' => 'Iniciar Sesion', 'url' => ['/site/login']]

            ],
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
        </div>
    </main>

    <body>
        <div class="container">
            <?= $content ?>
        </div>
    </body>



    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <strong>Copyright &copy; 2021-<?= date('Y'); ?> <a href="">Proyecto de Titulo - Rodrigo Andres Garcia Trautmann</a>.</strong>
            Universidad del BIO-BIO.
            <div class="float-right d-none d-sm-inline-block">
                <b>Sistema de Cometidos para SERVIU Ñuble</b> v 1.0
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>