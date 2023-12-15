<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnergiaelectricaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Energiaelectricas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="energiaelectrica-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Energiaelectrica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEnergia',
            'objMensual',
            'objAnual',
            'meta',
            'mes',
            //'ano',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
