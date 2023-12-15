<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Desperdicios */

$this->title = 'Update Desperdicios: ' . $model->idDesperdicios;
$this->params['breadcrumbs'][] = ['label' => 'Desperdicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDesperdicios, 'url' => ['view', 'idDesperdicios' => $model->idDesperdicios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="desperdicios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
