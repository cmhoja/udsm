<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SlideShows;

/**
 * SlideShowsSearch represents the model behind the search form about `app\models\SlideShows`.
 */
class SlideShowsSearch extends SlideShows {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Id', 'UnitID', 'Status'], 'integer'],
            [['TitleEn', 'TitleSw', 'DetailsEn', 'DetailsSw', 'LinkToPage', 'Image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = SlideShows::find();

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
            'Status' => $this->Status,
        ]);


        $query->andFilterWhere(['like', 'TitleEn', $this->TitleEn])
                ->andFilterWhere(['like', 'TitleSw', $this->TitleSw])
                ->andFilterWhere(['like', 'DetailsEn', $this->DetailsEn])
                ->andFilterWhere(['like', 'DetailsSw', $this->DetailsSw])
                ->andFilterWhere(['like', 'LinkToPage', $this->LinkToPage])
                ->andFilterWhere(['like', 'Image', $this->Image])
                ->orderBy('DateCreated DESC');

        return $dataProvider;
    }

}
