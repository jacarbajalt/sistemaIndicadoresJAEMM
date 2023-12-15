<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GasnaturalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gasnaturals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gasnatural-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gasnatural', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idGasNatural',
            'objMensual',
            'objAnual',
            'meta',
            'mes',
            //'ano',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
