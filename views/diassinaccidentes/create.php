<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diassinaccidentes */

$this->title = 'Create Diassinaccidentes';
$this->params['breadcrumbs'][] = ['label' => 'Diassinaccidentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diassinaccidentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
