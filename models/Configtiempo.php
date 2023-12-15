<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configtiempo".
 *
 * @property int $idConfig
 * @property int|null $segundos
 */
class Configtiempo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configtiempo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['segundos'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idConfig' => 'Id Config',
            'segundos' => 'Segundos',
        ];
    }
}
