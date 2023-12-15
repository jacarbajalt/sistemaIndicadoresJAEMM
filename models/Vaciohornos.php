<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vaciohornos".
 *
 * @property int $idvacioHornos
 * @property float $objMensual
 * @property float $objAnual
 * @property float $objMeta
 * @property string $mes
 * @property string $ano
 */
class Vaciohornos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaciohornos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objMensual', 'objAnual', 'objMeta', 'mes', 'ano'], 'required'],
            [['objMensual', 'objAnual', 'objMeta'], 'number'],
            [['mes', 'ano'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvacioHornos' => 'Idvacio Hornos',
            'objMensual' => 'Obj Mensual',
            'objAnual' => 'Obj Anual',
            'objMeta' => 'Obj Meta',
            'mes' => 'Mes',
            'ano' => 'Ano',
        ];
    }
}
