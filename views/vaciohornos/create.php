<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vaciohornos */

$this->title = 'Create Vaciohornos';
$this->params['breadcrumbs'][] = ['label' => 'Vaciohornos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vaciohornos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
