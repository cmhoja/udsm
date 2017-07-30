<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contacts;

/**
 * ContactsSearch represents the model behind the search form about `app\models\Contacts`.
 */
class ContactsSearch extends Contacts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'UnitID'], 'integer'],
            [['ContactTitle', 'PhoneNo', 'FaxNo', 'EmailAddress', 'GoogleMapCode'], 'safe'],
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
        $query = Contacts::find();

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

        $query->andFilterWhere(['like', 'ContactTitle', $this->ContactTitle])
            ->andFilterWhere(['like', 'PhoneNo', $this->PhoneNo])
            ->andFilterWhere(['like', 'FaxNo', $this->FaxNo])
            ->andFilterWhere(['like', 'EmailAddress', $this->EmailAddress])
            ->andFilterWhere(['like', 'GoogleMapCode', $this->GoogleMapCode]);

        return $dataProvider;
    }
}
