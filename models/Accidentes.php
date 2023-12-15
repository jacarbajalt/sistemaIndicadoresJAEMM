<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accidentes".
 *
 * @property int $idAccidente
 * @property string $nombreUsuario
 * @property string $apPaternoUsuario
 * @property string|null $apMaternoUsuario
 * @property string $areaUsuario
 * @property string $descripcionAccidente
 * @property string|null $turnoUsuario
 * @property string $supervisor
 * @property string $fechaYhora
 * @property int $areas_idArea
 * @property int $record
 *
 * @property Areas $areasIdArea
 * @property Diassinaccidentes $diassinaccidentes
 */
class Accidentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accidentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreUsuario', 'apPaternoUsuario', 'areaUsuario', 'descripcionAccidente', 'supervisor', 'areas_idArea', 'record'], 'required'],
            [['turnoUsuario'], 'string'],
            [['fechaYhora'], 'safe'],
            [['areas_idArea', 'record'], 'integer'],
            [['nombreUsuario'], 'string', 'max' => 100],
            [['apPaternoUsuario'], 'string', 'max' => 50],
            [['apMaternoUsuario', 'areaUsuario'], 'string', 'max' => 45],
            [['descripcionAccidente'], 'string', 'max' => 400],
            [['supervisor'], 'string', 'max' => 150],
            [['areas_idArea'], 'exist', 'skipOnError' => true, 'targetClass' => Areas::className(), 'targetAttribute' => ['areas_idArea' => 'idArea']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAccidente' => 'ID Accidente',
            'nombreUsuario' => 'Nombre',
            'apPaternoUsuario' => 'Apellido Paterno',
            'apMaternoUsuario' => 'Apellido Materno',
            'areaUsuario' => 'Área',
            'descripcionAccidente' => 'Descripción Accidente',
            'turnoUsuario' => 'Turno Usuario',
            'supervisor' => 'Supervisor',
            'fechaYhora' => 'Fecha y Hora',
            'areas_idArea' => 'ID Área',
            'record' => 'Record',
        ];
    }

    /**
     * Gets query for [[AreasIdArea]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreasIdArea()
    {
        return $this->hasOne(Areas::className(), ['idArea' => 'areas_idArea']);
    }

    /**
     * Gets query for [[Diassinaccidentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiassinaccidentes()
    {
        return $this->hasOne(Diassinaccidentes::className(), ['accidentes_idAccidente' => 'idAccidente']);
    }
}
