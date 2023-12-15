<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Areas;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'apPaterno')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'apMaterno')->textInput(['maxlength' => true]) ?>
        </div>
    </div>    

    <?php $estadoArea=ArrayHelper::map(Areas::find()->where(['estado'=>'Activo'])->all(), 'nombreArea', 'nombreArea') ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'areaCargo')->dropDownList($estadoArea, ['prompt' => 'Seleccione Area'])?>
        </div>
        <div class="col-md-6">
        <?= $form->field($model, 'rol')->dropDownList([ 'Administrador' => 'Administrador', 'Supervisor' => 'Supervisor', 'Visitante' => 'Visitante', ], ['prompt' => 'Seleccione Rol de Usuario']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'contrasena')->passwordInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'turno')->dropDownList([ 'Matutino' => 'Matutino', 'Vespertino' => 'Vespertino', 'Nocturno' => 'Nocturno', ], ['prompt' => 'Seleccione Turno']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'estado')->dropDownList([ 'Activo' => 'Activo', 'Inactivo' => 'Inactivo', ], ['prompt' => 'Seleccione Estado']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar Datos', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
