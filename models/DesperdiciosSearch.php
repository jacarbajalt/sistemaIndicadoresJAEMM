<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Desperdicios;

/**
 * DesperdiciosSearch represents the model behind the search form of `app\models\Desperdicios`.
 */
class DesperdiciosSearch extends Desperdicios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idDesperdicios'], 'integer'],
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
        $query = Desperdicios::find();

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
            'idDesperdicios' => $this->idDesperdicios,
            'objMensual' => $this->objMensual,
            'objAnual' => $this->objAnual,
            'meta' => $this->meta,
        ]);

        $query->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }
}
