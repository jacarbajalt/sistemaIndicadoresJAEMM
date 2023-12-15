<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use app\models\Configtiempo;

$this->title = 'Selector de Tiempo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?php
    $seg=0;

    $mysqli = new mysqli("localhost", "root", "Carbajal2001!", "vitromex");
    $selectQueryTiempo = $mysqli->prepare("SELECT * FROM Configtiempo");
    $selectQueryTiempo->execute();
    $selectQueryTiempoResult = $selectQueryTiempo->get_result();


    if ($selectQueryTiempoResult->num_rows > 0) {


    while($selectQueryRowTiempo = $selectQueryTiempoResult->fetch_array()) {
         
          
          $seg = $selectQueryRowTiempo["segundos"];
        }
      } else {

        echo "0 resultados";
        }

    $form=ActiveForm::begin(); 
    ?>

    <?= $form->field($model, 'segundos')->dropDownList([ 10 => '10', 20 => '20', 40 => '40', 60 => '60',], ['prompt' => 'Seleccione Tiempo de Carga']) ?>

    <?= Html::submitButton('Seleccionar', ['class'=>'btn btn-outline-success']) ?>



    <?php ActiveForm::end(); ?>
</div>
<script>
    setTimeout("location.href='index.php?r=site%2Findex'", <?php echo $seg*1000; ?>);
  </script>