<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Region;

/**
 * RegionSearch represents the model behind the search form of `app\models\Region`.
 */
class RegionSearch extends Region
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_region', 'numero_region'], 'integer'],
            [['nombre_region'], 'safe'],
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
        $query = Region::find();

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
            'id_region' => $this->id_region,
            'numero_region' => $this->numero_region,
        ]);

        $query->andFilterWhere(['like', 'nombre_region', $this->nombre_region]);

        return $dataProvider;
    }
}
