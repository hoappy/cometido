<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ModificacionComitido;

/**
 * ModificacionComitidoSearch represents the model behind the search form of `app\models\ModificacionComitido`.
 */
class ModificacionComitidoSearch extends ModificacionComitido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modificacion', 'transporte_regreso', 'transporte_ida', 'con_viatico', 'dias_sin_pernoctar', 'dias_con_pernoctar', 'estado', 'fk_id_cometido'], 'integer'],
            [['fecha_fin', 'hora_fin'], 'safe'],
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
        $query = ModificacionComitido::find();

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
            'id_modificacion' => $this->id_modificacion,
            'fecha_fin' => $this->fecha_fin,
            'hora_fin' => $this->hora_fin,
            'transporte_regreso' => $this->transporte_regreso,
            'transporte_ida' => $this->transporte_ida,
            'con_viatico' => $this->con_viatico,
            'dias_sin_pernoctar' => $this->dias_sin_pernoctar,
            'dias_con_pernoctar' => $this->dias_con_pernoctar,
            'estado' => $this->estado,
            'fk_id_cometido' => $this->fk_id_cometido,
        ]);

        return $dataProvider;
    }
}
