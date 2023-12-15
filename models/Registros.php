<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registros".
 *
 * @property int $idregistros
 * @property int $usuarios_idUsuario
 * @property int $gasNatural_idGasNatural
 * @property int $calidad_idcalidad
 * @property int $desperdicios_idDesperdicios
 * @property int $energiaElectrica_idEnergia
 * @property int $vacioHornos_idvacioHornos
 * @property int $volumenProduccion_idVolumen
 *
 * @property Calidad $calidadIdcalidad
 * @property Desperdicios $desperdiciosIdDesperdicios
 * @property Energiaelectrica $energiaElectricaIdEnergia
 * @property Gasnatural $gasNaturalIdGasNatural
 * @property Usuarios $usuariosIdUsuario
 * @property Vaciohornos $vacioHornosIdvacioHornos
 * @property Volumenproduccion $volumenProduccionIdVolumen
 */
class Registros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_idUsuario', 'gasNatural_idGasNatural', 'calidad_idcalidad', 'desperdicios_idDesperdicios', 'energiaElectrica_idEnergia', 'vacioHornos_idvacioHornos', 'volumenProduccion_idVolumen'], 'required'],
            [['usuarios_idUsuario', 'gasNatural_idGasNatural', 'calidad_idcalidad', 'desperdicios_idDesperdicios', 'energiaElectrica_idEnergia', 'vacioHornos_idvacioHornos', 'volumenProduccion_idVolumen'], 'integer'],
            [['calidad_idcalidad'], 'exist', 'skipOnError' => true, 'targetClass' => Calidad::className(), 'targetAttribute' => ['calidad_idcalidad' => 'idcalidad']],
            [['desperdicios_idDesperdicios'], 'exist', 'skipOnError' => true, 'targetClass' => Desperdicios::className(), 'targetAttribute' => ['desperdicios_idDesperdicios' => 'idDesperdicios']],
            [['energiaElectrica_idEnergia'], 'exist', 'skipOnError' => true, 'targetClass' => Energiaelectrica::className(), 'targetAttribute' => ['energiaElectrica_idEnergia' => 'idEnergia']],
            [['gasNatural_idGasNatural'], 'exist', 'skipOnError' => true, 'targetClass' => Gasnatural::className(), 'targetAttribute' => ['gasNatural_idGasNatural' => 'idGasNatural']],
            [['usuarios_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_idUsuario' => 'idUsuario']],
            [['vacioHornos_idvacioHornos'], 'exist', 'skipOnError' => true, 'targetClass' => Vaciohornos::className(), 'targetAttribute' => ['vacioHornos_idvacioHornos' => 'idvacioHornos']],
            [['volumenProduccion_idVolumen'], 'exist', 'skipOnError' => true, 'targetClass' => Volumenproduccion::className(), 'targetAttribute' => ['volumenProduccion_idVolumen' => 'idVolumen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idregistros' => 'Idregistros',
            'usuarios_idUsuario' => 'Usuarios Id Usuario',
            'gasNatural_idGasNatural' => 'Gas Natural Id Gas Natural',
            'calidad_idcalidad' => 'Calidad Idcalidad',
            'desperdicios_idDesperdicios' => 'Desperdicios Id Desperdicios',
            'energiaElectrica_idEnergia' => 'Energia Electrica Id Energia',
            'vacioHornos_idvacioHornos' => 'Vacio Hornos Idvacio Hornos',
            'volumenProduccion_idVolumen' => 'Volumen Produccion Id Volumen',
        ];
    }

    /**
     * Gets query for [[CalidadIdcalidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalidadIdcalidad()
    {
        return $this->hasOne(Calidad::className(), ['idcalidad' => 'calidad_idcalidad']);
    }

    /**
     * Gets query for [[DesperdiciosIdDesperdicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesperdiciosIdDesperdicios()
    {
        return $this->hasOne(Desperdicios::className(), ['idDesperdicios' => 'desperdicios_idDesperdicios']);
    }

    /**
     * Gets query for [[EnergiaElectricaIdEnergia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEnergiaElectricaIdEnergia()
    {
        return $this->hasOne(Energiaelectrica::className(), ['idEnergia' => 'energiaElectrica_idEnergia']);
    }

    /**
     * Gets query for [[GasNaturalIdGasNatural]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGasNaturalIdGasNatural()
    {
        return $this->hasOne(Gasnatural::className(), ['idGasNatural' => 'gasNatural_idGasNatural']);
    }

    /**
     * Gets query for [[UsuariosIdUsuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosIdUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['idUsuario' => 'usuarios_idUsuario']);
    }

    /**
     * Gets query for [[VacioHornosIdvacioHornos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacioHornosIdvacioHornos()
    {
        return $this->hasOne(Vaciohornos::className(), ['idvacioHornos' => 'vacioHornos_idvacioHornos']);
    }

    /**
     * Gets query for [[VolumenProduccionIdVolumen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVolumenProduccionIdVolumen()
    {
        return $this->hasOne(Volumenproduccion::className(), ['idVolumen' => 'volumenProduccion_idVolumen']);
    }
}
