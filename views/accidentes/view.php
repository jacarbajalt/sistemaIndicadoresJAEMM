<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accidentes */

$this->title = $model->idAccidente;
$this->params['breadcrumbs'][] = ['label' => 'Accidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="accidentes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-edit"></i> Actualizar', ['update', 'idAccidente' => $model->idAccidente, 'areas_idArea' => $model->areas_idArea], ['class' => 'btn btn-outline-warning']) ?>
        <?= Html::a('<i class="fas fa-trash"></i> Eliminar', ['delete', 'idAccidente' => $model->idAccidente, 'areas_idArea' => $model->areas_idArea], [
            'class' => 'btn btn-outline-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fas fa-arrow-left"></i> Regresar', ["/accidentes"], ['class'=>'btn btn-outline-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAccidente',
            'nombreUsuario',
            'apPaternoUsuario',
            'apMaternoUsuario',
            'areaUsuario',
            'descripcionAccidente',
            'turnoUsuario',
            'supervisor',
            'fechaYhora',
            'areas_idArea',
            'record',
        ],
    ]) ?>

</div>
