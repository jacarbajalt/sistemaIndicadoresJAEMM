<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diassinaccidentes */

$this->title = $model->accidentes_idAccidente;
$this->params['breadcrumbs'][] = ['label' => 'Diassinaccidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diassinaccidentes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'accidentes_idAccidente' => $model->accidentes_idAccidente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'accidentes_idAccidente' => $model->accidentes_idAccidente], [
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
            'record',
            'accidentes_idAccidente',
        ],
    ]) ?>

</div>
