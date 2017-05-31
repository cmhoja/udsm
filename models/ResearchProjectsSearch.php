<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ResearchProjects;

/**
 * ResearchProjectsSearch represents the model behind the search form about `app\models\ResearchProjects`.
 */
class ResearchProjectsSearch extends ResearchProjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'UnitID'], 'integer'],
            [['ProjectNameEn', 'ProjectNameSw', 'DetailsEn', 'DetailsSw', 'Principal', 'OtherResearcher', 'Funding', 'StartYear', 'EndYear'], 'safe'],
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
        $query = ResearchProjects::find();

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
            'UnitID' => $this->UnitID,
            'StartYear' => $this->StartYear,
            'EndYear' => $this->EndYear,
        ]);

        $query->andFilterWhere(['like', 'ProjectNameEn', $this->ProjectNameEn])
            ->andFilterWhere(['like', 'ProjectNameSw', $this->ProjectNameSw])
            ->andFilterWhere(['like', 'DetailsEn', $this->DetailsEn])
            ->andFilterWhere(['like', 'DetailsSw', $this->DetailsSw])
            ->andFilterWhere(['like', 'Principal', $this->Principal])
            ->andFilterWhere(['like', 'OtherResearcher', $this->OtherResearcher])
            ->andFilterWhere(['like', 'Funding', $this->Funding]);

        return $dataProvider;
    }
}
