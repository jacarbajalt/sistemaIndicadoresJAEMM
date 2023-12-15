<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Inicio de Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<div class="site-login" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <center><img src="../img/logoInicioS.png" class="text-center"></center>

    <p class="text-center">Ingrese sus datos para Iniciar Sesión en el Sistema:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
    ]); ?>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
    
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Usuario'])->label(false) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña'])->label(false) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div class="col-md-4"></div>
    </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <div class="form-group">
                <?= Html::submitButton('<i class="fas fa-sign-in-alt"></i> Iniciar Sesión', ['class' => 'btn btn-outline-primary', 'name' => 'login-button']) ?>
        </div>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row text-center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?= Html::a('¿Olvidaste tu Contraseña?', ['site/recuperar']) ?>
            </div>
            <div class="col-md-4"></div>
        </div>
        

    <?php ActiveForm::end(); ?>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
