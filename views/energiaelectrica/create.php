<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Energiaelectrica */

$this->title = 'Create Energiaelectrica';
$this->params['breadcrumbs'][] = ['label' => 'Energiaelectricas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="energiaelectrica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
