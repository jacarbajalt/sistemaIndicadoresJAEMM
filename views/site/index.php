<?php

/* @var $this yii\web\View */
use app\models\User;
use app\models\Calidad;
use app\models\Configtiempo;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Indicadores';
?>

<div class="site-index" data-aos="fade-down-left">

  <div class="jumbotron text-center bg-transparent">
    <h2>Grafica Actual</h2>
    <h4>Metas para el Periodo <?= date('m-Y') ?></h4>
    <!-- <button id="change-chart" type="button">Toggle chart</button> -->
    <?php 
    //$db=Yii::$app->db;
    $mysqli = new mysqli("localhost", "root", "Carbajal2001!", "vitromex");

    $selectQuery = $mysqli->prepare("SELECT * from calidad where mes=(SELECT date_format(now(), '%m'))");
    $selectQuery->execute();
    $selectQueryResult = $selectQuery->get_result();
    $selectQueryGas = $mysqli->prepare("SELECT * from gasnatural where mes=(SELECT date_format(now(), '%m'))");
    $selectQueryGas->execute();
    $selectQueryGasResult = $selectQueryGas->get_result();
    $selectQueryDesperdicios = $mysqli->prepare("SELECT * FROM desperdicios where mes=(SELECT date_format(now(), '%m'))");
    $selectQueryDesperdicios->execute();
    $selectQueryDesperdiciosResult = $selectQueryDesperdicios->get_result();
    $selectQueryEnergia = $mysqli->prepare("SELECT * FROM energiaelectrica where mes=(SELECT date_format(now(), '%m'))");
    $selectQueryEnergia->execute();
    $selectQueryEnergiaResult = $selectQueryEnergia->get_result();
    $selectQueryHornos = $mysqli->prepare("SELECT * FROM vaciohornos where mes=(SELECT date_format(now(), '%m'))");
    $selectQueryHornos->execute();
    $selectQueryHornosResult = $selectQueryHornos->get_result();
    $selectQueryProduccion = $mysqli->prepare("SELECT * FROM volumenproduccion where mes=(SELECT date_format(now(), '%m'))");
    $selectQueryProduccion->execute();
    $selectQueryProduccionResult = $selectQueryProduccion->get_result();

    if(isset($_REQUEST['seg']))
        $seg=$_REQUEST['seg'];
    else{
        $seg=5000;
    } 
// Loop 
        
    ?>
  </div>
  <script>
    setTimeout("location.href='index.php?r=accidentes%2Fcontador&seg=<?php echo $seg; ?>'", <?php echo $seg*1000; ?>);
  </script>
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
        
        while($selectQueryRow = $selectQueryResult->fetch_array()) {
         
          echo "['Calidad', ".$selectQueryRow["objMeta"].", ".$selectQueryRow["objMensual"]."],";
          
        }

        while($selectQueryRowGas = $selectQueryGasResult->fetch_array()) {
         
          echo "['Gas', ".$selectQueryRowGas["meta"].", ".$selectQueryRowGas["objMensual"]."],";
        }

        while($selectQueryRowDesperdicios = $selectQueryDesperdiciosResult->fetch_array()) {
         
          echo "['Desperdicios', ".$selectQueryRowDesperdicios["meta"].", ".$selectQueryRowDesperdicios["objMensual"]."],";
        }

        while($selectQueryRowEnergia = $selectQueryEnergiaResult->fetch_array()) {
         
          echo "['Energia', ".$selectQueryRowEnergia["meta"].", ".$selectQueryRowEnergia["objMensual"]."],";
        }

        while($selectQueryRowHornos = $selectQueryHornosResult->fetch_array()) {
         
          echo "['Vacio de los Hornos', ".$selectQueryRowHornos["objMeta"].", ".$selectQueryRowHornos["objMensual"]."],";
        }

        while($selectQueryRowProduccion = $selectQueryProduccionResult->fetch_array()) {
         
          echo "['Volumen de Produccion', ".$selectQueryRowProduccion["objMeta"].", ".$selectQueryRowProduccion["objMensual"]."],";
        }
        
        ?>
        
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
