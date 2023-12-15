<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gasnatural */

$this->title = 'Create Gasnatural';
$this->params['breadcrumbs'][] = ['label' => 'Gasnaturals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gasnatural-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
