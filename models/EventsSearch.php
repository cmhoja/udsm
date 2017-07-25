<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Events;

/**
 * EventsSearch represents the model behind the search form about `app\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DateCreated', 'EventUrl', 'EventTitleEn', 'EventTitleSw', 'DescriptionEn', 'DescriptionSw', 'StartDate', 'EndDate', 'Attachment', 'DatePosted'], 'safe'],
            [['Id', 'UnitID', 'Status'], 'integer'],
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
        $query = Events::find();

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
            'DateCreated' => $this->DateCreated,
            'StartDate' => $this->StartDate,
            'EndDate' => $this->EndDate,
            'Id' => $this->Id,
            'UnitID' => $this->UnitID,
            'Status' => $this->Status,
            'DatePosted' => $this->DatePosted,
        ]);

        $query->andFilterWhere(['like', 'EventUrl', $this->EventUrl])
            ->andFilterWhere(['like', 'EventTitleEn', $this->EventTitleEn])
            ->andFilterWhere(['like', 'EventTitleSw', $this->EventTitleSw])
            ->andFilterWhere(['like', 'DescriptionEn', $this->DescriptionEn])
            ->andFilterWhere(['like', 'DescriptionSw', $this->DescriptionSw])
            ->andFilterWhere(['like', 'Attachment', $this->Attachment]);

        return $dataProvider;
    }
}
