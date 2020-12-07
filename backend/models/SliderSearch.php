<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Slider;

/**
 * SliderSearch represents the model behind the search form of `app\models\Slider`.
 */
class SliderSearch extends Slider
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'slider_id', 'position', 'posted'], 'integer'],
            [['item_name', 'url', 'title'], 'safe'],
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
        $query = Slider::find();

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
            'id' => $this->id,
            'slider_id' => $this->slider_id,
            'position' => $this->position,
            'posted' => $this->posted,
        ]);

        $query->andFilterWhere(['like', 'item_name', $this->item_name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
