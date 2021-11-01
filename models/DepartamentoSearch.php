<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departamento;

/**
 * DepartamentoSearch represents the model behind the search form of `app\models\Departamento`.
 */
class DepartamentoSearch extends Departamento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_departamento', 'cant_funcionarios', 'piso', 'estado'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = Departamento::find();

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
            'id_departamento' => $this->id_departamento,
            'cant_funcionarios' => $this->cant_funcionarios,
            'piso' => $this->piso,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
