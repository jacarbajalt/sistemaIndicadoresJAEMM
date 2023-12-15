<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccidentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accidentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accidentes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> Agregar Accidente', ['create'], ['class' => 'btn btn-outline-success']) ?>
        <?= Html::a('<i class="fas fa-eye"></i> Ver Dias sin Accidentes', ['contador'], ['class' => 'btn btn-outline-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idAccidente',
            'nombreUsuario',
            'apPaternoUsuario',
            'apMaternoUsuario',
            'areaUsuario',
            'descripcionAccidente',
            //'turnoUsuario',
            //'supervisor',
            //'fechaYhora',
            //'areas_idArea',
            //'record',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
