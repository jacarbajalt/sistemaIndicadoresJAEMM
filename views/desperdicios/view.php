<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Desperdicios */

$this->title = $model->idDesperdicios;
$this->params['breadcrumbs'][] = ['label' => 'Desperdicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="desperdicios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idDesperdicios' => $model->idDesperdicios], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idDesperdicios' => $model->idDesperdicios], [
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
            'idDesperdicios',
            'objMensual',
            'objAnual',
            'meta',
            'mes',
            'ano',
        ],
    ]) ?>

</div>
