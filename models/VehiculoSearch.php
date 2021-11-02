<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form of `app\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vehiculo', 'tipo_combustible', 'estado', 'kilometraje', 'rendimiento', 'fk_id'], 'integer'],
            [['patente', 'modelo', 'marca', 'num_chasis'], 'safe'],
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
        $query = Vehiculo::find();

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
            'id_vehiculo' => $this->id_vehiculo,
            'tipo_combustible' => $this->tipo_combustible,
            'estado' => $this->estado,
            'kilometraje' => $this->kilometraje,
            'rendimiento' => $this->rendimiento,
            'fk_id' => $this->fk_id,
        ]);

        $query->andFilterWhere(['like', 'patente', $this->patente])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'num_chasis', $this->num_chasis]);

        return $dataProvider;
    }
}
