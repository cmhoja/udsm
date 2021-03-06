<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form about `app\models\Users`.
 */
class UsersSearch extends Users {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Id', 'UserType', 'UnitID', 'Status'], 'integer'],
            [['FName', 'LName', 'UserName', 'Password', 'EmailAddress'], 'safe'],
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
        $query = Users::find();

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
            'UserType' => $this->UserType,
            'UnitID' => $this->UnitID,
        ]);

        $query->andFilterWhere(['like', 'FName', $this->FName])
                ->andFilterWhere(['like', 'LName', $this->LName])
                ->andFilterWhere(['like', 'EmailAddress', $this->EmailAddress])
                ->andFilterWhere(['like', 'UserName', $this->UserName])
                ->andFilterWhere(['like', 'Password', $this->Password]);

        return $dataProvider;
    }

}
