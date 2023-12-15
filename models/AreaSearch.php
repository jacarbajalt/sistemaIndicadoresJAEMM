<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Areas;

/**
 * AreaSearch represents the model behind the search form of `app\models\Areas`.
 */
class AreaSearch extends Areas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idArea', 'usuarios_idUsuario'], 'integer'],
            [['nombreArea', 'fechaYhora', 'estado'], 'safe'],
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
        $query = Areas::find();

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
            'idArea' => $this->idArea,
            'fechaYhora' => $this->fechaYhora,
            'usuarios_idUsuario' => $this->usuarios_idUsuario,
        ]);

        $query->andFilterWhere(['like', 'nombreArea', $this->nombreArea])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
