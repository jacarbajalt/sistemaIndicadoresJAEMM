<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "energiaelectrica".
 *
 * @property int $idEnergia
 * @property float $objMensual
 * @property float $objAnual
 * @property float $meta
 * @property string $mes
 * @property string $ano
 */
class Energiaelectrica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'energiaelectrica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objMensual', 'objAnual', 'meta', 'mes', 'ano'], 'required'],
            [['objMensual', 'objAnual', 'meta'], 'number'],
            [['mes', 'ano'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEnergia' => 'Id Energia',
            'objMensual' => 'Obj Mensual',
            'objAnual' => 'Obj Anual',
            'meta' => 'Meta',
            'mes' => 'Mes',
            'ano' => 'Ano',
        ];
    }
}
