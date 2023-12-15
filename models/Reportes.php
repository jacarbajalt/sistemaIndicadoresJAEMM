<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reportes".
 *
 * @property string $mesCalidad
 * @property string $anoCalidad
 * @property float $mensualCalidad
 * @property float $metaCalidad
 * @property string $mesDesperdicio
 * @property string $anoDesperdicios
 * @property float $mensualDes
 * @property float $metaDesperdicios
 * @property string $mesEnergia
 * @property string $anoEnergiaElectrica
 * @property float $mensualEnergia
 * @property float $metaEnergia
 * @property string $mesGas
 * @property string $anoGasNatural
 * @property float $mensualGas
 * @property float $metaGas
 * @property string $mesVHornos
 * @property string $anoVHornos
 * @property float $mensualVHornos
 * @property float $metaVHornos
 * @property string $mesVolumen
 * @property string $anoVolumen
 * @property int $mensualVol
 * @property int $metaVol
 */
class Reportes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reportes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mesCalidad', 'anoCalidad', 'mensualCalidad', 'metaCalidad', 'mesDesperdicio', 'anoDesperdicios', 'mensualDes', 'metaDesperdicios', 'mesEnergia', 'anoEnergiaElectrica', 'mensualEnergia', 'metaEnergia', 'mesGas', 'anoGasNatural', 'mensualGas', 'metaGas', 'mesVHornos', 'anoVHornos', 'mensualVHornos', 'metaVHornos', 'mesVolumen', 'anoVolumen', 'mensualVol', 'metaVol'], 'required'],
            [['mesCalidad', 'anoCalidad', 'mesDesperdicio', 'anoDesperdicios', 'mesEnergia', 'anoEnergiaElectrica', 'mesGas', 'anoGasNatural', 'mesVHornos', 'anoVHornos', 'mesVolumen', 'anoVolumen'], 'string'],
            [['mensualCalidad', 'metaCalidad', 'mensualDes', 'metaDesperdicios', 'mensualEnergia', 'metaEnergia', 'mensualGas', 'metaGas', 'mensualVHornos', 'metaVHornos'], 'number'],
            [['mensualVol', 'metaVol'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mesCalidad' => 'Mes Calidad',
            'anoCalidad' => 'Ano Calidad',
            'mensualCalidad' => 'Mensual Calidad',
            'metaCalidad' => 'Meta Calidad',
            'mesDesperdicio' => 'Mes Desperdicio',
            'anoDesperdicios' => 'Ano Desperdicios',
            'mensualDes' => 'Mensual Des',
            'metaDesperdicios' => 'Meta Desperdicios',
            'mesEnergia' => 'Mes Energia',
            'anoEnergiaElectrica' => 'Ano Energia Electrica',
            'mensualEnergia' => 'Mensual Energia',
            'metaEnergia' => 'Meta Energia',
            'mesGas' => 'Mes Gas',
            'anoGasNatural' => 'Ano Gas Natural',
            'mensualGas' => 'Mensual Gas',
            'metaGas' => 'Meta Gas',
            'mesVHornos' => 'Mes V Hornos',
            'anoVHornos' => 'Ano V Hornos',
            'mensualVHornos' => 'Mensual V Hornos',
            'metaVHornos' => 'Meta V Hornos',
            'mesVolumen' => 'Mes Volumen',
            'anoVolumen' => 'Ano Volumen',
            'mensualVol' => 'Mensual Vol',
            'metaVol' => 'Meta Vol',
        ];
    }
}
