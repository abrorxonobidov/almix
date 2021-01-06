<?php

namespace backend\models;

use common\models\Lists;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ListsSearch represents the model behind the search form of `common\models\Lists`.
 */
class ListsSearch extends Lists
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'order'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'preview_uz', 'preview_ru', 'preview_en', 'description_uz', 'description_ru', 'description_en', 'preview_image', 'gallery'], 'safe'],
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
        $query = Lists::find();

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
            'category_id' => $this->category_id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'preview_uz', $this->preview_uz])
            ->andFilterWhere(['like', 'preview_ru', $this->preview_ru])
            ->andFilterWhere(['like', 'preview_en', $this->preview_en])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_en', $this->description_en])
            ->andFilterWhere(['like', 'preview_image', $this->preview_image])
            ->andFilterWhere(['like', 'gallery', $this->gallery]);

        return $dataProvider;
    }
}
