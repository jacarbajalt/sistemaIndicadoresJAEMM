<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accidentes */

$this->title = 'Agregar Accidentes';
$this->params['breadcrumbs'][] = ['label' => 'Accidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accidentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
