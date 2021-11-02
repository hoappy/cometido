<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ciudad;

/**
 * CiudadSearch represents the model behind the search form of `app\models\Ciudad`.
 */
class CiudadSearch extends Ciudad
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ciudad', 'fk_id_provincia'], 'integer'],
            [['nombre_ciudad'], 'safe'],
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
        $query = Ciudad::find();

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
            'id_ciudad' => $this->id_ciudad,
            'fk_id_provincia' => $this->fk_id_provincia,
        ]);

        $query->andFilterWhere(['like', 'nombre_ciudad', $this->nombre_ciudad]);

        return $dataProvider;
    }
}
