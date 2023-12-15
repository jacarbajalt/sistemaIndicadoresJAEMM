<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gasnatural */

$this->title = $model->idGasNatural;
$this->params['breadcrumbs'][] = ['label' => 'Gasnaturals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gasnatural-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idGasNatural' => $model->idGasNatural], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idGasNatural' => $model->idGasNatural], [
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
            'idGasNatural',
            'objMensual',
            'objAnual',
            'meta',
            'mes',
            'ano',
        ],
    ]) ?>

</div>
