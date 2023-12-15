<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property int $idArea
 * @property string $nombreArea
 * @property string $fechaYhora
 * @property int $usuarios_idUsuario
 * @property string $estado
 *
 * @property Accidentes[] $accidentes
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreArea', 'usuarios_idUsuario', 'estado'], 'required'],
            [['fechaYhora'], 'safe'],
            [['usuarios_idUsuario'], 'integer'],
            [['estado'], 'string'],
            [['nombreArea'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idArea' => 'Id Area',
            'nombreArea' => 'Nombre Area',
            'fechaYhora' => 'Fecha Yhora',
            'usuarios_idUsuario' => 'Usuarios Id Usuario',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Accidentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccidentes()
    {
        return $this->hasMany(Accidentes::className(), ['areas_idArea' => 'idArea']);
    }
}
