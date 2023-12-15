<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Calidad */

$this->title = 'Update Calidad: ' . $model->idcalidad;
$this->params['breadcrumbs'][] = ['label' => 'Calidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcalidad, 'url' => ['view', 'idcalidad' => $model->idcalidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="calidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
