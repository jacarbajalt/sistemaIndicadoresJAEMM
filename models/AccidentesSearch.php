<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accidentes;

/**
 * AccidentesSearch represents the model behind the search form of `app\models\Accidentes`.
 */
class AccidentesSearch extends Accidentes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAccidente', 'areas_idArea', 'record'], 'integer'],
            [['nombreUsuario', 'apPaternoUsuario', 'apMaternoUsuario', 'areaUsuario', 'descripcionAccidente', 'turnoUsuario', 'supervisor', 'fechaYhora'], 'safe'],
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
        $query = Accidentes::find();

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
            'idAccidente' => $this->idAccidente,
            'fechaYhora' => $this->fechaYhora,
            'areas_idArea' => $this->areas_idArea,
            'record' => $this->record,
        ]);

        $query->andFilterWhere(['like', 'nombreUsuario', $this->nombreUsuario])
            ->andFilterWhere(['like', 'apPaternoUsuario', $this->apPaternoUsuario])
            ->andFilterWhere(['like', 'apMaternoUsuario', $this->apMaternoUsuario])
            ->andFilterWhere(['like', 'areaUsuario', $this->areaUsuario])
            ->andFilterWhere(['like', 'descripcionAccidente', $this->descripcionAccidente])
            ->andFilterWhere(['like', 'turnoUsuario', $this->turnoUsuario])
            ->andFilterWhere(['like', 'supervisor', $this->supervisor]);

        return $dataProvider;
    }
}
