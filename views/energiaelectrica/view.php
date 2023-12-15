<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Energiaelectrica */

$this->title = $model->idEnergia;
$this->params['breadcrumbs'][] = ['label' => 'Energiaelectricas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="energiaelectrica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idEnergia' => $model->idEnergia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idEnergia' => $model->idEnergia], [
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
            'idEnergia',
            'objMensual',
            'objAnual',
            'meta',
            'mes',
            'ano',
        ],
    ]) ?>

</div>
