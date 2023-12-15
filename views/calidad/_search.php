<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CalidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcalidad') ?>

    <?= $form->field($model, 'calidadPrimera') ?>

    <?= $form->field($model, 'calidadSegunda') ?>

    <?= $form->field($model, 'objMeta') ?>

    <?= $form->field($model, 'objMensual') ?>

    <?php // echo $form->field($model, 'objAnual') ?>

    <?php // echo $form->field($model, 'volumenCalidad') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'mes') ?>

    <?php // echo $form->field($model, 'ano') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
