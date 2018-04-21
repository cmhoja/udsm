<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MenuItem;

/**
 * MenuItemSearch represents the model behind the search form about `app\models\MenuItem`.
 */
class MenuItemSearch extends MenuItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'MenuID', 'ParentItemID', 'LostOrder', 'SectionID'], 'integer'],
            [['ItemNameEn', 'ItemNameSw', 'LinkUrl'], 'safe'],
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
        $query = MenuItem::find();

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
            'MenuID' => $this->MenuID,
            'ParentItemID' => $this->ParentItemID,
            'LostOrder' => $this->LostOrder,
            'SectionID' => $this->SectionID,
        ]);

        $query->andFilterWhere(['like', 'ItemNameEn', $this->ItemNameEn])
            ->andFilterWhere(['like', 'ItemNameSw', $this->ItemNameSw])
            ->andFilterWhere(['like', 'LinkUrl', $this->LinkUrl]);

        return $dataProvider;
    }
}
