<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Viaje;

/**
 * ViajeSearch represents the model behind the search form of `app\models\Viaje`.
 */
class ViajeSearch extends Viaje
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_viaje', 'combustible_litros', 'combustible_pesos', 'kilometros_salida', 'kilometros_llegada', 'kilometros_total', 'estado', 'fk_id_vehiculo', 'fk_id_cometido', 'fk_id'], 'integer'],
            [['hora_salida', 'hora_llegada', 'observaciones'], 'safe'],
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
        $query = Viaje::find();

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
            'id_viaje' => $this->id_viaje,
            'hora_salida' => $this->hora_salida,
            'hora_llegada' => $this->hora_llegada,
            'combustible_litros' => $this->combustible_litros,
            'combustible_pesos' => $this->combustible_pesos,
            'kilometros_salida' => $this->kilometros_salida,
            'kilometros_llegada' => $this->kilometros_llegada,
            'kilometros_total' => $this->kilometros_total,
            'estado' => $this->estado,
            'fk_id_vehiculo' => $this->fk_id_vehiculo,
            'fk_id_cometido' => $this->fk_id_cometido,
            'fk_id' => $this->fk_id,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
