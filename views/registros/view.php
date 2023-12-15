<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registros */

$this->title = $model->idregistros;
$this->params['breadcrumbs'][] = ['label' => 'Registros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registros-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idregistros' => $model->idregistros, 'usuarios_idUsuario' => $model->usuarios_idUsuario, 'gasNatural_idGasNatural' => $model->gasNatural_idGasNatural, 'calidad_idcalidad' => $model->calidad_idcalidad, 'desperdicios_idDesperdicios' => $model->desperdicios_idDesperdicios, 'energiaElectrica_idEnergia' => $model->energiaElectrica_idEnergia, 'vacioHornos_idvacioHornos' => $model->vacioHornos_idvacioHornos, 'volumenProduccion_idVolumen' => $model->volumenProduccion_idVolumen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idregistros' => $model->idregistros, 'usuarios_idUsuario' => $model->usuarios_idUsuario, 'gasNatural_idGasNatural' => $model->gasNatural_idGasNatural, 'calidad_idcalidad' => $model->calidad_idcalidad, 'desperdicios_idDesperdicios' => $model->desperdicios_idDesperdicios, 'energiaElectrica_idEnergia' => $model->energiaElectrica_idEnergia, 'vacioHornos_idvacioHornos' => $model->vacioHornos_idvacioHornos, 'volumenProduccion_idVolumen' => $model->volumenProduccion_idVolumen], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idregistros',
            'usuarios_idUsuario',
            'gasNatural_idGasNatural',
            'calidad_idcalidad',
            'desperdicios_idDesperdicios',
            'energiaElectrica_idEnergia',
            'vacioHornos_idvacioHornos',
            'volumenProduccion_idVolumen',
        ],
    ]) ?>

</div>
