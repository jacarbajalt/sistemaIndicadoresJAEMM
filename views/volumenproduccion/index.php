<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VolumenproduccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Volumenproduccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volumenproduccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Volumenproduccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idVolumen',
            'objMensual',
            'objAnual',
            'objMeta',
            'mes',
            //'ano',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
