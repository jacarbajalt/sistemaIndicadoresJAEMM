<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Desperdicios */

$this->title = 'Create Desperdicios';
$this->params['breadcrumbs'][] = ['label' => 'Desperdicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="desperdicios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
