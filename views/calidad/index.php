<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CalidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calidads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calidad-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Calidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcalidad',
            'calidadPrimera',
            'calidadSegunda',
            'objMeta',
            'objMensual',
            //'objAnual',
            //'volumenCalidad',
            //'total',
            //'mes',
            //'ano',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
