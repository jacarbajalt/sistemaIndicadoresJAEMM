<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario', 'recover'], 'integer'],
            [['nombre', 'apPaterno', 'apMaterno', 'areaCargo', 'rol', 'correo', 'accessToken', 'authKey', 'username', 'contrasena', 'turno', 'estado', 'fechaYhora', 'codigoVerificacion'], 'safe'],
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
        $query = Usuarios::find();

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
            'idUsuario' => $this->idUsuario,
            'fechaYhora' => $this->fechaYhora,
            'recover' => $this->recover,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apPaterno', $this->apPaterno])
            ->andFilterWhere(['like', 'apMaterno', $this->apMaterno])
            ->andFilterWhere(['like', 'areaCargo', $this->areaCargo])
            ->andFilterWhere(['like', 'rol', $this->rol])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'contrasena', $this->contrasena])
            ->andFilterWhere(['like', 'turno', $this->turno])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'codigoVerificacion', $this->codigoVerificacion]);

        return $dataProvider;
    }
}
