<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sector;

/**
 * SectorSearch represents the model behind the search form of `app\models\Sector`.
 */
class SectorSearch extends Sector
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sector', 'estado', 'fk_id_ciudad'], 'integer'],
            [['nombre_sector'], 'safe'],
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
        $query = Sector::find();

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
            'id_sector' => $this->id_sector,
            'estado' => $this->estado,
            'fk_id_ciudad' => $this->fk_id_ciudad,
        ]);

        $query->andFilterWhere(['like', 'nombre_sector', $this->nombre_sector]);

        return $dataProvider;
    }
}
