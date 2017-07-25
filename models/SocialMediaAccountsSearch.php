<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SocialMediaAccounts;

/**
 * SocialMediaAccountsSearch represents the model behind the search form about `app\models\SocialMediaAccounts`.
 */
class SocialMediaAccountsSearch extends SocialMediaAccounts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'UnitID'], 'integer'],
            [['AccountName', 'AccountAddress', 'AccountLogoClass'], 'safe'],
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
        $query = SocialMediaAccounts::find();

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

        $query->andFilterWhere(['like', 'AccountName', $this->AccountName])
            ->andFilterWhere(['like', 'AccountAddress', $this->AccountAddress])
            ->andFilterWhere(['like', 'AccountLogoClass', $this->AccountLogoClass]);

        return $dataProvider;
    }
}
