<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accidentes */

$this->title = 'Actualizar Accidente: ' . $model->idAccidente;
$this->params['breadcrumbs'][] = ['label' => 'Accidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAccidente, 'url' => ['view', 'idAccidente' => $model->idAccidente, 'areas_idArea' => $model->areas_idArea]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accidentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
