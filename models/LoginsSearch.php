<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Logins;

/**
 * LoginsSearch represents the model behind the search form about `app\models\Logins`.
 */
class LoginsSearch extends Logins
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'UserId'], 'integer'],
            [['DateCreated', 'IpAddress', 'Details'], 'safe'],
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
        $query = Logins::find();

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
            'UserId' => $this->UserId,
            'DateCreated' => $this->DateCreated,
        ]);

        $query->andFilterWhere(['like', 'IpAddress', $this->IpAddress])
            ->andFilterWhere(['like', 'Details', $this->Details]);

        return $dataProvider;
    }
}
