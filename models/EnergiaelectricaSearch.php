<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Energiaelectrica;

/**
 * EnergiaelectricaSearch represents the model behind the search form of `app\models\Energiaelectrica`.
 */
class EnergiaelectricaSearch extends Energiaelectrica
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEnergia'], 'integer'],
            [['objMensual', 'objAnual', 'meta'], 'number'],
            [['mes', 'ano'], 'safe'],
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
        $query = Energiaelectrica::find();

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
            'idEnergia' => $this->idEnergia,
            'objMensual' => $this->objMensual,
            'objAnual' => $this->objAnual,
            'meta' => $this->meta,
        ]);

        $query->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }
}
