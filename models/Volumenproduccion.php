<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "volumenproduccion".
 *
 * @property int $idVolumen
 * @property int $objMensual
 * @property int $objAnual
 * @property int $objMeta
 * @property string $mes
 * @property string $ano
 */
class Volumenproduccion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'volumenproduccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['objMensual', 'objAnual', 'objMeta', 'mes', 'ano'], 'required'],
            [['objMensual', 'objAnual', 'objMeta'], 'integer'],
            [['mes', 'ano'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idVolumen' => 'Id Volumen',
            'objMensual' => 'Obj Mensual',
            'objAnual' => 'Obj Anual',
            'objMeta' => 'Obj Meta',
            'mes' => 'Mes',
            'ano' => 'Ano',
        ];
    }
}
