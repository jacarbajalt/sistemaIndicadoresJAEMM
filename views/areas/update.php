<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Areas */

$this->title = 'Update Areas: ' . $model->idArea;
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idArea, 'url' => ['view', 'idArea' => $model->idArea, 'usuarios_idUsuario' => $model->usuarios_idUsuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="areas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
