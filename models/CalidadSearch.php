<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calidad;

/**
 * CalidadSearch represents the model behind the search form of `app\models\Calidad`.
 */
class CalidadSearch extends Calidad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcalidad'], 'integer'],
            [['calidadPrimera', 'calidadSegunda', 'objMeta', 'objMensual', 'objAnual', 'volumenCalidad', 'total'], 'number'],
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
        $query = Calidad::find();

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
            'idcalidad' => $this->idcalidad,
            'calidadPrimera' => $this->calidadPrimera,
            'calidadSegunda' => $this->calidadSegunda,
            'objMeta' => $this->objMeta,
            'objMensual' => $this->objMensual,
            'objAnual' => $this->objAnual,
            'volumenCalidad' => $this->volumenCalidad,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'ano', $this->ano]);

        return $dataProvider;
    }
}
