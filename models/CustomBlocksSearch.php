<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CustomBlocks;

/**
 * CustomBlocksSearch represents the model behind the search form about `app\models\CustomBlocks`.
 */
class CustomBlocksSearch extends CustomBlocks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'BlockUnitID', 'BlockType', 'BlockPlacementAreaRegion', 'Status'], 'integer'],
            [['BlockTitleEn', 'BlockTitleSw', 'BlockDetailsEn', 'BlockDetailsSw', 'BlockIconPicture', 'BlockIconVideo', 'LinkToPage', 'ShowOnPage'], 'safe'],
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
        $query = CustomBlocks::find();

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
            'BlockUnitID' => $this->BlockUnitID,
            'BlockType' => $this->BlockType,
            'BlockPlacementAreaRegion' => $this->BlockPlacementAreaRegion,
            'Status' => $this->Status,
        ]);
        $query->orderBy('Id DESC');

        $query->andFilterWhere(['like', 'BlockTitleEn', $this->BlockTitleEn])
            ->andFilterWhere(['like', 'BlockTitleSw', $this->BlockTitleSw])
            ->andFilterWhere(['like', 'BlockDetailsEn', $this->BlockDetailsEn])
            ->andFilterWhere(['like', 'BlockDetailsSw', $this->BlockDetailsSw])
            ->andFilterWhere(['like', 'BlockIconPicture', $this->BlockIconPicture])
            ->andFilterWhere(['like', 'BlockIconVideo', $this->BlockIconVideo])
            ->andFilterWhere(['like', 'LinkToPage', $this->LinkToPage])
            ->andFilterWhere(['like', 'ShowOnPage', $this->ShowOnPage]);

        return $dataProvider;
    }
}
