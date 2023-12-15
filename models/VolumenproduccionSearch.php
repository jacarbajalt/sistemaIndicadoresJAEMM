<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Volumenproduccion;

/**
 * VolumenproduccionSearch represents the model behind the search form of `app\models\Volumenproduccion`.
 */
class VolumenproduccionSearch extends Volumenproduccion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idVolumen', 'objMensual', 'objAnual', 'objMeta'], 'integer'],
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
        $query = Volumenproduccion::find();

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
            'idVolumen' => $this->idVolumen,
            'objMensual' => $this->objMensual,
            'objAnual' => $this->objAnual,
            'objMeta' => $this->objMeta,
        ]);

        $query->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }
}
