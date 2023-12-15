<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diassinaccidentes */

$this->title = 'Update Diassinaccidentes: ' . $model->accidentes_idAccidente;
$this->params['breadcrumbs'][] = ['label' => 'Diassinaccidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->accidentes_idAccidente, 'url' => ['view', 'accidentes_idAccidente' => $model->accidentes_idAccidente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diassinaccidentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
