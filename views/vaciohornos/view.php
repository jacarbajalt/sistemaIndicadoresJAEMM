<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vaciohornos */

$this->title = $model->idvacioHornos;
$this->params['breadcrumbs'][] = ['label' => 'Vaciohornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vaciohornos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idvacioHornos' => $model->idvacioHornos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idvacioHornos' => $model->idvacioHornos], [
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
            'idvacioHornos',
            'objMensual',
            'objAnual',
            'objMeta',
            'mes',
            'ano',
        ],
    ]) ?>

</div>
