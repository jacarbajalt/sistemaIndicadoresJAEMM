<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnergiaelectricaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="energiaelectrica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idEnergia') ?>

    <?= $form->field($model, 'objMensual') ?>

    <?= $form->field($model, 'objAnual') ?>

    <?= $form->field($model, 'meta') ?>

    <?= $form->field($model, 'mes') ?>

    <?php // echo $form->field($model, 'ano') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
