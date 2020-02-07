<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Advent;

/**
 * Search represents the model behind the search form of `app\models\Advent`.
 */
class Search extends Model
{
    public $id;
    public $title;
    public $description;
    public $price;
    public $contacts;
    public $model;
    public $year;
    public $carcase;
    public $mileage;
    public $conditioner;
    public $airbags;
    public $multimedia;
    public $cruise_control;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'year', 'mileage', 'conditioner', 'airbags', 'multimedia', 'cruise_control'], 'integer'],
            [['title', 'description', 'contacts', 'model', 'carcase'], 'safe'],
            [['price'], 'number'],
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
        $query = Advent::find();
        $query->joinWith(['car' => function($model){
            $model->joinWith(['characteristic','option']);
        }]);
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
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'mileage', $this->mileage])
            ->andFilterWhere(['like', 'carcase', $this->carcase])
            ->andFilterWhere(['like', 'conditioner', $this->conditioner])
            ->andFilterWhere(['like', 'airbags', $this->airbags])
            ->andFilterWhere(['like', 'multimedia', $this->multimedia])
            ->andFilterWhere(['like', 'cruise_control', $this->cruise_control]);

        return $dataProvider;
    }
}
