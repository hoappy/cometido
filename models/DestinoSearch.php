<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Destino;

/**
 * DestinoSearch represents the model behind the search form of `app\models\Destino`.
 */
class DestinoSearch extends Destino
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_destino', 'fk_id_cometido', 'fk_id_sector'], 'integer'],
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
        $query = Destino::find();

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
            'id_destino' => $this->id_destino,
            'fk_id_cometido' => $this->fk_id_cometido,
            'fk_id_sector' => $this->fk_id_sector,
        ]);

        return $dataProvider;
    }
}
