<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_sections".
 *
 * @property integer $Id
 * @property string $SectionName
 * @property integer $SectionPlacement
 *
 * @property TblMenuItem[] $tblMenuItems
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SectionName'], 'required'],
            [['SectionPlacement'], 'integer'],
            [['SectionName'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'SectionName' => 'Section Name',
            'SectionPlacement' => 'Section Placement',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMenuItems()
    {
        return $this->hasMany(MenuItem::className(), ['SectionID' => 'Id']);
    }
}
