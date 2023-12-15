<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Recuperacion de Contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid" data-aos="fade-right">
<h3><?= $msg ?></h3>
 
 <h1>Recuperar Contraseña</h1>
 <?php $form = ActiveForm::begin([
     'method' => 'post',
     'enableClientValidation' => true,
 ]);
 ?>
  
 <div class="form-group">
  <?= $form->field($model, 'correo')->textInput(['maxlength' => true, 'placeholder'=>'Correo Electronico']) ?>
 </div>
  
 <?= Html::submitButton("Recuperar Contraseña", ["class" => "btn btn-primary"]) ?>
  
 <?php $form->end() ?>
</div>
 
