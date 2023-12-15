<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccidentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accidentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idAccidente') ?>

    <?= $form->field($model, 'nombreUsuario') ?>

    <?= $form->field($model, 'apPaternoUsuario') ?>

    <?= $form->field($model, 'apMaternoUsuario') ?>

    <?= $form->field($model, 'areaUsuario') ?>

    <?php // echo $form->field($model, 'descripcionAccidente') ?>

    <?php // echo $form->field($model, 'turnoUsuario') ?>

    <?php // echo $form->field($model, 'supervisor') ?>

    <?php // echo $form->field($model, 'fechaYhora') ?>

    <?php // echo $form->field($model, 'areas_idArea') ?>

    <?php // echo $form->field($model, 'record') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
