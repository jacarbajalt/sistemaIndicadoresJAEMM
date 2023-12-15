<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Accidentes;
use app\models\Configtiempo;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DÍAS SIN ACCIDENTES';
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="container">
	<div class="text-center rounded">
		<h1>DÍAS SIN ACCIDENTES</h1>
		<h4 class="text-primary display-2">
			<?php

			$result = Yii::$app->getDb()->createCommand('SELECT * FROM diasrecord')->queryColumn();

			foreach($result as $key => $row){
				$rowabs=abs($row);
				echo  $rowabs.'<br />'; 
			}
			?>
		</h4>
		<h3>GRACIAS POR SU COMPROMISO</h2>
			<br>
			<h2>ÚLTIMO RÉCORD</h2>
			<h4 class="text-success display-3">
				<?php
				$result2 = Yii::$app->getDb()->createCommand('SELECT record FROM accidentes WHERE idAccidente=(SELECT MAX(idAccidente) FROM accidentes)')->queryColumn();

				foreach($result2 as $key2 => $row2){
					$rowabs2=abs($row2);
					echo  $rowabs2.'<br />'; 
				} 
				?>
			</h4>
			<br>
			<?= Html::a('<i class="fas fa-arrow-left"></i> Regresar al menu anterior', ['index'], ['class'=>'btn btn-info']) ?>
		</div>
	</div>
	<?php 
	if(isset($_REQUEST['seg']))
		$seg=$_REQUEST['seg'];
	else{
		$seg=5000;
	}
	?>
<script>
    setTimeout("location.href='index.php?r=site%2Findex&seg=<?php echo $seg; ?>'", <?php echo $seg*1000; ?>);
  </script>
