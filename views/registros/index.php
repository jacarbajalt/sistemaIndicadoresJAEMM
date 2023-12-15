<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegistrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Registros', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idregistros',
            'usuarios_idUsuario',
            'gasNatural_idGasNatural',
            'calidad_idcalidad',
            'desperdicios_idDesperdicios',
            //'energiaElectrica_idEnergia',
            //'vacioHornos_idvacioHornos',
            //'volumenProduccion_idVolumen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
