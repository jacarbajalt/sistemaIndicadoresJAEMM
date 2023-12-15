<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registros;

/**
 * RegistrosSearch represents the model behind the search form of `app\models\Registros`.
 */
class RegistrosSearch extends Registros
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idregistros', 'usuarios_idUsuario', 'gasNatural_idGasNatural', 'calidad_idcalidad', 'desperdicios_idDesperdicios', 'energiaElectrica_idEnergia', 'vacioHornos_idvacioHornos', 'volumenProduccion_idVolumen'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Registros::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idregistros' => $this->idregistros,
            'usuarios_idUsuario' => $this->usuarios_idUsuario,
            'gasNatural_idGasNatural' => $this->gasNatural_idGasNatural,
            'calidad_idcalidad' => $this->calidad_idcalidad,
            'desperdicios_idDesperdicios' => $this->desperdicios_idDesperdicios,
            'energiaElectrica_idEnergia' => $this->energiaElectrica_idEnergia,
            'vacioHornos_idvacioHornos' => $this->vacioHornos_idvacioHornos,
            'volumenProduccion_idVolumen' => $this->volumenProduccion_idVolumen,
        ]);

        return $dataProvider;
    }
}
