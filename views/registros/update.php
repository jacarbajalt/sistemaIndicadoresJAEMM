<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Registros */

$this->title = 'Update Registros: ' . $model->idregistros;
$this->params['breadcrumbs'][] = ['label' => 'Registros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idregistros, 'url' => ['view', 'idregistros' => $model->idregistros, 'usuarios_idUsuario' => $model->usuarios_idUsuario, 'gasNatural_idGasNatural' => $model->gasNatural_idGasNatural, 'calidad_idcalidad' => $model->calidad_idcalidad, 'desperdicios_idDesperdicios' => $model->desperdicios_idDesperdicios, 'energiaElectrica_idEnergia' => $model->energiaElectrica_idEnergia, 'vacioHornos_idvacioHornos' => $model->vacioHornos_idvacioHornos, 'volumenProduccion_idVolumen' => $model->volumenProduccion_idVolumen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
