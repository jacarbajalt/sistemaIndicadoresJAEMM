<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Desperdicios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="desperdicios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'objMensual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'objAnual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mes')->dropDownList([ '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', 10 => '10', 11 => '11', 12 => '12', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ano')->dropDownList([ 2019 => '2019', 2020 => '2020', 2021 => '2021', 2022 => '2022', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
