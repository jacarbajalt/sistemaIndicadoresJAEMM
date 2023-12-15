<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Calidad */

$this->title = 'Create Calidad';
$this->params['breadcrumbs'][] = ['label' => 'Calidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
