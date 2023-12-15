<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idregistros') ?>

    <?= $form->field($model, 'usuarios_idUsuario') ?>

    <?= $form->field($model, 'gasNatural_idGasNatural') ?>

    <?= $form->field($model, 'calidad_idcalidad') ?>

    <?= $form->field($model, 'desperdicios_idDesperdicios') ?>

    <?php // echo $form->field($model, 'energiaElectrica_idEnergia') ?>

    <?php // echo $form->field($model, 'vacioHornos_idvacioHornos') ?>

    <?php // echo $form->field($model, 'volumenProduccion_idVolumen') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
