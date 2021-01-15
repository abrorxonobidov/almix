<?php

namespace frontend\models;

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
            [['id', 'category_id', 'order', 'status'], 'integer'],
            //[['title_uz', 'title_ru', 'title_en', 'preview_uz', 'preview_ru', 'preview_en', 'description_uz', 'description_ru', 'description_en', 'preview_image', 'gallery'], 'safe'],
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
        $query = Lists::find()
            ->active();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_DESC,
                    'id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 21
            ]
        ]);

        $this->load($params);

        if (!$this->validate())
            return $dataProvider;

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'order' => $this->order,
            'status' => $this->status
        ]);

        $query
            ->andFilterWhere([
                'OR',
                ['like', 'title_uz', $this->title_uz],
                ['like', 'title_ru', $this->title_uz],
                ['like', 'title_en', $this->title_uz]
            ])
            ->andFilterWhere([
                'OR',
                ['like', 'preview_uz', $this->preview_uz],
                ['like', 'preview_ru', $this->preview_uz],
                ['like', 'preview_en', $this->preview_uz]
            ]);

        return $dataProvider;
    }
}
