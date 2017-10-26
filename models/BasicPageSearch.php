<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BasicPage;

/**
 * BasicPageSearch represents the model behind the search form about `app\models\BasicPage`.
 */
class BasicPageSearch extends BasicPage {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['PageId', 'Status', 'UnitID'], 'integer'],
            [['PageTitleEn', 'PageTitleSw', 'DescriptionEn', 'DescriptionSw', 'Attachment', 'EmbededVideo', 'PageSeoUrl', 'DateCreated'], 'safe'],
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
        $query = BasicPage::find();

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
            //'PageId' => $this->PageId,
            'PageTitleEn' => $this->PageTitleEn,
            'Status' => $this->Status,
            'PageSeoUrl' => $this->PageSeoUrl,
            'UnitID' => $this->UnitID
        ]);
        $query->orderBy(['PageId' => SORT_DESC]);
        $query->andFilterWhere(['like', 'PageTitleSw', $this->PageTitleSw])
                ->andFilterWhere(['like', 'DescriptionEn', $this->DescriptionEn])
                ->andFilterWhere(['like', 'DescriptionSw', $this->DescriptionSw])
                ->andFilterWhere(['like', 'Attachment', $this->Attachment])
                ->andFilterWhere(['like', 'EmbededVideo', $this->EmbededVideo]);

        return $dataProvider;
    }

}
