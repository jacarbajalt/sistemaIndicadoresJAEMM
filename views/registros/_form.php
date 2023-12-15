<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Registros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usuarios_idUsuario')->textInput() ?>

    <?= $form->field($model, 'gasNatural_idGasNatural')->textInput() ?>

    <?= $form->field($model, 'calidad_idcalidad')->textInput() ?>

    <?= $form->field($model, 'desperdicios_idDesperdicios')->textInput() ?>

    <?= $form->field($model, 'energiaElectrica_idEnergia')->textInput() ?>

    <?= $form->field($model, 'vacioHornos_idvacioHornos')->textInput() ?>

    <?= $form->field($model, 'volumenProduccion_idVolumen')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
