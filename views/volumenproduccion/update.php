<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Volumenproduccion */

$this->title = 'Update Volumenproduccion: ' . $model->idVolumen;
$this->params['breadcrumbs'][] = ['label' => 'Volumenproduccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVolumen, 'url' => ['view', 'idVolumen' => $model->idVolumen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="volumenproduccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
