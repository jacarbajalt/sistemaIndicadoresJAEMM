<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\User;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/b5c7161fc1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'innerContainerOptions' => ['class' => 'container-fluid'],
        'brandLabel' => '<img src="'.Yii::$app->getUrlManager()->getBaseUrl().'../../img/logoVitromex.png"  class="img-responsive" widht="100px">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light style fixed-top',
            'style' => 'background-image: linear-gradient(-90deg, #BCBCBC, #000000)'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            !Yii::$app->user->isGuest ? (
                ['label'=> 'Herramientas', 'url'=>['#'],
                'items'=>[
                    ['label' => 'Reportes', 'url' => ['/site/about']],
                    ['label' => 'Tiempo de Espera', 'url' => ['/site/tiempo']],
                ]
            ]):(''),
            //['label' => 'Contacto', 'url' => ['/site/contact']],

            !Yii::$app->user->isGuest && User::isAdmin(Yii::$app->user->identity->idUsuario) && User::isActivo(Yii::$app->user->identity->idUsuario) ? (
            ['label' => 'Menú Principal', 'url' => ['#'],
            
            'items' => [
                ['label' => 'Usuarios', 'url' => ['/usuarios/index']],
                ['label' => 'Areas', 'url' => ['/areas/index']],
                ['label' => 'Accidentes', 'url' => ['/accidentes/index']],
                ]
            ]):(''),

            !Yii::$app->user->isGuest && User::isAdmin(Yii::$app->user->identity->idUsuario) && User::isActivo(Yii::$app->user->identity->idUsuario) ? (
            ['label' => 'Objetivos', 'url' => ['#'],
                'items' => [
                    ['label' => 'Calidad', 'url' => ['/calidad/index']],
                    ['label' => 'Desperdicio', 'url' => ['/desperdicios/index']],
                    ['label' => 'Energia', 'url' => ['/energiaelectrica/index']],
                    ['label' => 'Gas', 'url' => ['/gasnatural/index']],
                    ['label' => 'Vacio de los Hornos', 'url' => ['/vaciohornos/index']],
                    ['label' => 'Volumen de Produccion', 'url' => ['/volumenproduccion/index']],
                    ]
                ]):(''),

            !Yii::$app->user->isGuest && User::isSupervisor(Yii::$app->user->identity->idUsuario) && User::isActivo(Yii::$app->user->identity->idUsuario) ? (
            ['label' => 'Accidentes', 'url' => ['/accidentes/index'],
            ]):(''),

            !Yii::$app->user->isGuest && User::isSupervisor(Yii::$app->user->identity->idUsuario) && User::isActivo(Yii::$app->user->identity->idUsuario) ? (
            ['label' => 'Objetivos', 'url' => ['#'],
                'items' => [
                    ['label' => 'Calidad', 'url' => ['/calidad/index']],
                    ['label' => 'Gas', 'url' => ['/gasnatural/index']],
                    ['label' => 'Desperdicio', 'url' => ['/desperdicios/index']],
                    ['label' => 'Energia', 'url' => ['/energiaelectrica/index']],
                    ['label' => 'Vacio de los Hornos', 'url' => ['/vaciohornos/index']],
                    ['label' => 'Volumen de Produccion', 'url' => ['/volumenproduccion/index']],
                    ]
                ]):(''),

            


            Yii::$app->user->isGuest ? (
                ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    '<i class="fas fa-sign-out-alt"></i> Cerrar Sesión (' . Yii::$app->user->identity->NombreCompleto . ')',
                        ['class' => 'btn btn-link text-dark logout']
                )
                . Html::endForm()
                . '</li>'
            )
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
        <?= $content ?>
    </div>
</main>

<footer class="text-center text-white" style="background-color: #f1f1f1;">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <p class="float-none">&copy; JAEMM <?= date('Y') ?></p>
  </div>
  <!-- Copyright -->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
