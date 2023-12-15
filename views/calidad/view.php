<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Calidad */

$this->title = $model->idcalidad;
$this->params['breadcrumbs'][] = ['label' => 'Calidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="calidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcalidad' => $model->idcalidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcalidad' => $model->idcalidad], [
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
            'idcalidad',
            'calidadPrimera',
            'calidadSegunda',
            'objMeta',
            'objMensual',
            'objAnual',
            'volumenCalidad',
            'total',
            'mes',
            'ano',
        ],
    ]) ?>

</div>
