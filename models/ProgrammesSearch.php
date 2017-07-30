<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programmes;

/**
 * ProgrammesSearch represents the model behind the search form about `app\models\Programmes`.
 */
class ProgrammesSearch extends Programmes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'UnitID'], 'integer'],
            [['ProgrammeNameEn', 'ProgrammeNameSw', 'ProgrammeUrl', 'Duration', 'DescriptionEn', 'DescriptionSw', 'EntryRequirements', 'ProgrammeType'], 'safe'],
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
        $query = Programmes::find();

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
        ]);

        $query->andFilterWhere(['like', 'ProgrammeNameEn', $this->ProgrammeNameEn])
            ->andFilterWhere(['like', 'ProgrammeNameSw', $this->ProgrammeNameSw])
            ->andFilterWhere(['like', 'ProgrammeUrl', $this->ProgrammeUrl])
            ->andFilterWhere(['like', 'Duration', $this->Duration])
            ->andFilterWhere(['like', 'DescriptionEn', $this->DescriptionEn])
            ->andFilterWhere(['like', 'DescriptionSw', $this->DescriptionSw])
            ->andFilterWhere(['like', 'EntryRequirements', $this->EntryRequirements])
            ->andFilterWhere(['like', 'ProgrammeType', $this->ProgrammeType]);

        return $dataProvider;
    }
}
