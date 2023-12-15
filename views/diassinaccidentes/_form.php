<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diassinaccidentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diassinaccidentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'record')->textInput() ?>

    <?= $form->field($model, 'accidentes_idAccidente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
