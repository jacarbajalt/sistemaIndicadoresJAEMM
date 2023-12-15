<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Volumenproduccion */

$this->title = 'Create Volumenproduccion';
$this->params['breadcrumbs'][] = ['label' => 'Volumenproduccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="volumenproduccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
