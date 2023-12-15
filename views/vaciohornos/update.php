<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vaciohornos */

$this->title = 'Update Vaciohornos: ' . $model->idvacioHornos;
$this->params['breadcrumbs'][] = ['label' => 'Vaciohornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvacioHornos, 'url' => ['view', 'idvacioHornos' => $model->idvacioHornos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vaciohornos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
