<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Monto;

/**
 * MontoSearch represents the model behind the search form of `app\models\Monto`.
 */
class MontoSearch extends Monto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_monto', 'monto_sin_pernoctar', 'monto_con_pernoctar', 'grado', 'estado', 'fk_id_item'], 'integer'],
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
        $query = Monto::find();

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
            'id_monto' => $this->id_monto,
            'monto_sin_pernoctar' => $this->monto_sin_pernoctar,
            'monto_con_pernoctar' => $this->monto_con_pernoctar,
            'grado' => $this->grado,
            'estado' => $this->estado,
            'fk_id_item' => $this->fk_id_item,
        ]);

        return $dataProvider;
    }
}
