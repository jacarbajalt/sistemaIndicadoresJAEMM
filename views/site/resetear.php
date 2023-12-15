<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Restablecimiento de Contraseña';
?>

<h3><?= $msg ?></h3>
  
<h1>Restablecimiento de Contraseña</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'enableClientValidation' => true,
]);
?>

<div class="form-group">
 <?= $form->field($model, 'correo')->textInput(['maxlength' => true, 'placeholder'=>'Correo Electronico']) ?>  
</div>
 
<div class="form-group">
 <?= $form->field($model, 'contrasena')->passwordInput(['maxlength' => true, 'placeholder'=>'Nueva Contraseña']) ?>  
</div>

<div class="form-group">
 <?= $form->field($model, "codigoVerificacion")->textInput(['maxlength' => true, 'placeholder'=>'Codigo de Verificacion']) ?>  
</div>

<div class="form-group">
 <?= $form->field($model, "recover")->input("hidden")->label(false) ?>  
</div>
 
<?= Html::submitButton("Restablecer contraseña", ["class" => "btn btn-primary"]) ?>
 
<?php $form->end() ?>