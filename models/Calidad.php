<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calidad".
 *
 * @property int $idcalidad
 * @property float $calidadPrimera
 * @property float $calidadSegunda
 * @property float $objMeta
 * @property float $objMensual
 * @property float $objAnual
 * @property float|null $volumenCalidad
 * @property float|null $total
 * @property string $mes
 * @property string $ano
 */
class Calidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calidadPrimera', 'calidadSegunda', 'objMeta', 'objMensual', 'objAnual', 'mes', 'ano'], 'required'],
            [['calidadPrimera', 'calidadSegunda', 'objMeta', 'objMensual', 'objAnual', 'volumenCalidad', 'total'], 'number'],
            [['mes', 'ano'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcalidad' => 'Idcalidad',
            'calidadPrimera' => 'Calidad Primera',
            'calidadSegunda' => 'Calidad Segunda',
            'objMeta' => 'Obj Meta',
            'objMensual' => 'Obj Mensual',
            'objAnual' => 'Obj Anual',
            'volumenCalidad' => 'Volumen Calidad',
            'total' => 'Total',
            'mes' => 'Mes',
            'ano' => 'Ano',
        ];
    }
    public function getVolCali()
    {
       $calidad1 = $this ->calidadPrimera;
       $calidad2 = $this ->calidadSegunda;
       $sumaTotal = $this ->total;
 
 
       $suma = $calidad1 + $calidad2;
       $sumaTotal = $suma;
 
       return $sumaTotal;
 
 
    }
    public function getVolCalidad()
    {
       $calidad1 = $this ->calidadPrimera;
       $calidad2 = $this ->calidadSegunda;
       $volCal = $this->volumenCalidad;
 
       $suma = $calidad1 + $calidad2;
 
       $divide = $calidad1 / $suma;
 
       $multiplica = $divide * 100;
 
       $volCal =$multiplica;
 
       return $volCal;
    }
}
