<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cometido;

/**
 * CometidoSearch represents the model behind the search form of `app\models\Cometido`.
 */
class CometidoSearch extends Cometido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cometido', 'con_viatico', 'dias_sin_pernoctar', 'dias_con_pernoctar', 'monto', 'tranporte_ida', 'transporte_regreso', 'estado', 'fk_id_item', 'fk_id', 'fk_id_director'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'hora_inicio', 'hora_fin', 'motivo_cometido', 'descreipcion'], 'safe'],
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
        $query = Cometido::find();

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
            'id_cometido' => $this->id_cometido,
            'con_viatico' => $this->con_viatico,
            'dias_sin_pernoctar' => $this->dias_sin_pernoctar,
            'dias_con_pernoctar' => $this->dias_con_pernoctar,
            'monto' => $this->monto,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
            'tranporte_ida' => $this->tranporte_ida,
            'transporte_regreso' => $this->transporte_regreso,
            'estado' => $this->estado,
            'fk_id_item' => $this->fk_id_item,
            'fk_id' => $this->fk_id,
            'fk_id_director' => $this->fk_id_director,
        ]);

        $query->andFilterWhere(['like', 'motivo_cometido', $this->motivo_cometido])
            ->andFilterWhere(['like', 'descreipcion', $this->descreipcion]);

        return $dataProvider;
    }
}
