<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gasnatural".
 *
 * @property int $idGasNatural
 * @property float $objMensual
 * @property string $objAnual
 * @property float $meta
 * @property string $mes
 * @property string $ano
 */
class Gasnatural extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gasnatural';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objMensual', 'objAnual', 'meta', 'mes', 'ano'], 'required'],
            [['objMensual', 'meta'], 'number'],
            [['mes', 'ano'], 'string'],
            [['objAnual'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idGasNatural' => 'Id Gas Natural',
            'objMensual' => 'Obj Mensual',
            'objAnual' => 'Obj Anual',
            'meta' => 'Meta',
            'mes' => 'Mes',
            'ano' => 'Ano',
        ];
    }
}
