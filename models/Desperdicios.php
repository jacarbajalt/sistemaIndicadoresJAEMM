<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "desperdicios".
 *
 * @property int $idDesperdicios
 * @property float $objMensual
 * @property float $objAnual
 * @property float $meta
 * @property string $mes
 * @property string $ano
 */
class Desperdicios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'desperdicios';
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
            'idDesperdicios' => 'Id Desperdicios',
            'objMensual' => 'Obj Mensual',
            'objAnual' => 'Obj Anual',
            'meta' => 'Meta',
            'mes' => 'Mes',
            'ano' => 'Ano',
        ];
    }
}
