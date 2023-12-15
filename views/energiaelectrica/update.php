<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Energiaelectrica */

$this->title = 'Update Energiaelectrica: ' . $model->idEnergia;
$this->params['breadcrumbs'][] = ['label' => 'Energiaelectricas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEnergia, 'url' => ['view', 'idEnergia' => $model->idEnergia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="energiaelectrica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
