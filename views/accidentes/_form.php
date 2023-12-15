<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Areas;

/* @var $this yii\web\View */
/* @var $model app\models\Accidentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accidentes-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'nombreUsuario')->textInput(['maxlength' => true, 'placeholder'=>'Nombre del Trabajador']) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'apPaternoUsuario')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'apMaternoUsuario')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
    <?php $areas=ArrayHelper::map (Areas::find()->all(), 'nombreArea', "nombreArea") ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'areaUsuario')->dropDownList($areas, ['prompt' => 'Seleccione Area']) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'descripcionAccidente')->textArea(['rows' => '5', 'placeholder'=>'Máx. 400 caracteres', 'maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'turnoUsuario')->dropDownList([ 'Matutino' => 'Matutino', 'Vespertino' => 'Vespertino', 'Nocturno' => 'Nocturno', ], ['prompt' => 'Seleccionar Turno']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'supervisor')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?php
            $areas=ArrayHelper::map (Areas::find()->all(), 'idArea', 'nombreArea')
            ?>

            <?=$form->field($model, 'areas_idArea')->dropDownList($areas, ['prompt'=>'Seleccionar Área'])
            ?>
        </div>
        <div class="col-md-6">
            
            <?= $form->field($model, 'record')->textInput(['placeholder'=>'Ingresar récord anterior']) ?>
        </div>
    </div>
    

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-plus"></i> Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fas fa-times"></i> Regresar', ["/accidentes"], ['class'=>'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
