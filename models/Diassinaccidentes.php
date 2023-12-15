<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diassinaccidentes".
 *
 * @property int $record
 * @property int $accidentes_idAccidente
 *
 * @property Accidentes $accidentesIdAccidente
 */
class Diassinaccidentes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diassinaccidentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record', 'accidentes_idAccidente'], 'required'],
            [['record', 'accidentes_idAccidente'], 'integer'],
            [['accidentes_idAccidente'], 'unique'],
            [['accidentes_idAccidente'], 'exist', 'skipOnError' => true, 'targetClass' => Accidentes::className(), 'targetAttribute' => ['accidentes_idAccidente' => 'idAccidente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'record' => 'Record',
            'accidentes_idAccidente' => 'Accidentes Id Accidente',
        ];
    }

    /**
     * Gets query for [[AccidentesIdAccidente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccidentesIdAccidente()
    {
        return $this->hasOne(Accidentes::className(), ['idAccidente' => 'accidentes_idAccidente']);
    }
}
