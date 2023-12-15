<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gasnatural */

$this->title = 'Update Gasnatural: ' . $model->idGasNatural;
$this->params['breadcrumbs'][] = ['label' => 'Gasnaturals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idGasNatural, 'url' => ['view', 'idGasNatural' => $model->idGasNatural]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gasnatural-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
