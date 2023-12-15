<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Reportes;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Generador de Reportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about" data-aos="flip-up">

<div class="jumbotron text-center bg-transparent">
        <h2>Selector de Graficas</h2>
        <h4>Seleccione el Periodo a Generar</h4>
        <?php
        $model=new Reportes();

        
  
        $form=ActiveForm::begin(); 
        
        ?>

        <?= $form->field($model, 'mesCalidad')->dropDownList([ '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', 10 => '10', 11 => '11', 12 => '12', ], ['prompt' => 'Seleccione Mes'])->label(false) ?>

        <?= $form->field($model, 'anoCalidad')->dropDownList([ 2019 => '2019', 2020 => '2020', 2021 => '2021', 2022 => '2022', ], ['prompt' => 'Seleccione Año'])->label(false) ?>

        <?= Html::submitButton('Buscar Datos', ['class' => 'btn btn-success']) ?>

        <?php ActiveForm::end(); ?>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Metas', 'Meta Establecida', 'Meta Mensual'], 
          <?php 
          if($model->load(Yii::$app->request->post())){
            $sql=Reportes::find()->where('mesCalidad=:mesCalidad', [':mesCalidad'=>$model->mesCalidad]);
            if($sql->count()==1){
              $sql=Reportes::find()->where('mesCalidad=:mesCalidad', [':mesCalidad'=>$model->mesCalidad])->one();
                echo "['Calidad', ".$sql->metaCalidad.", ".$sql->mensualCalidad."],";
                echo "['Gas', ".$sql->metaGas.", ".$sql->mensualGas."],";
                echo "['Desperdicios', ".$sql->metaDesperdicios.", ".$sql->mensualDes."],";
                echo "['Energia', ".$sql->metaEnergia.", ".$sql->mensualEnergia."],";
                echo "['Vacio de los Hornos', ".$sql->metaVHornos.", ".$sql->mensualVHornos."],";
                echo "['Volumen de Produccion', ".$sql->metaVol.", ".$sql->mensualVol."],";
            
          }
        }
        ?>
          // ['Calidad', 8000, 23.3],
          // ['Gas', 24000, 4.5],
          // ['Desperdicios', 30000, 14.3],
          // ['Energia', 50000, 0.9],
          // ['Vacio de los Hornos', 60000, 13.1]
        ]);

        var materialOptions = {
          width: 1200,
          chart: {
            //title: 'Nearby galaxies',
            //subtitle: 'distance on the left, brightness on the right'
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 900,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          //title: 'Nearby galaxies - distance on the left, brightness on the right',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'parsecs'},
            1: {title: 'apparent magnitude'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
    </script>
    <div id="chart_div" style="width: 800px; height: 500px;"></div>
</div>
