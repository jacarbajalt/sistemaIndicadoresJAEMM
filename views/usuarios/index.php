<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index" data-aos="fade-up"
     data-aos-duration="3000">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usuarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUsuario',
            'nombre',
            'apPaterno',
            'apMaterno',
            'areaCargo',
            //'rol',
            //'correo',
            //'accessToken',
            //'authKey',
            //'username',
            //'contrasena',
            //'turno',
            //'estado',
            //'fechaYhora',
            //'codigoVerificacion',
            //'recover',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
