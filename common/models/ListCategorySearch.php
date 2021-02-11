<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ListCategory;
use Yii;

/**
 * ListCategorySearch represents the model behind the search form of `common\models\ListCategory`.
 */
class ListCategorySearch extends ListCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'type_id'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'image'], 'safe'],
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
        $query = ListCategory::find();

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
            'parent_id' => $this->parent_id,
            'type_id' => $this->type_id,
        ]);

        $query->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }

    /**
     * @return array|ListCategory[]
     */
    public static function getMainCats()
    {
        return ListCategory::find()
            ->where(['IN', 'id', [2, 4, 5]])
            ->all();
    }

    /**
     * @return array|ListCategory[]
     */
    public static function getOtherCats()
    {
        return ListCategory::find()
            ->where(['NOT IN', 'id', [2, 4, 5]])
            ->all();
    }


}
