<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sections;

/**
 * SectionsSearch represents the model behind the search form about `app\models\Sections`.
 */
class SectionsSearch extends Sections
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'SectionPlacement'], 'integer'],
            [['SectionName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Sections::find();

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
            'Id' => $this->Id,
            'SectionPlacement' => $this->SectionPlacement,
        ]);

        $query->andFilterWhere(['like', 'SectionName', $this->SectionName]);

        return $dataProvider;
    }
}
