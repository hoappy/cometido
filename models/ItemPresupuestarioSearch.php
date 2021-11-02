<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemPresupuestario;

/**
 * ItemPresupuestarioSearch represents the model behind the search form of `app\models\ItemPresupuestario`.
 */
class ItemPresupuestarioSearch extends ItemPresupuestario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_item', 'porcentaje', 'estado'], 'integer'],
            [['nombre_item', 'descripcion'], 'safe'],
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
        $query = ItemPresupuestario::find();

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
            'id_item' => $this->id_item,
            'porcentaje' => $this->porcentaje,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'nombre_item', $this->nombre_item])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
