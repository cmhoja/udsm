<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_menu_item".
 *
 * @property integer $Id
 * @property integer $MenuID
 * @property string $ItemNameEn
 * @property string $ItemNameSw
 * @property string $LinkUrl
 * @property integer $ParentItemID
 * @property integer $LostOrder
 * @property integer $SectionID
 *
 * @property TblMenu $menu
 * @property TblSections $section
 */
class MenuItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MenuID', 'ItemNameEn', 'LinkUrl', 'LostOrder', 'SectionID'], 'required'],
            [['MenuID', 'ParentItemID', 'LostOrder', 'SectionID'], 'integer'],
            [['ItemNameEn', 'ItemNameSw', 'LinkUrl'], 'string', 'max' => 50],
            [['MenuID'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['MenuID' => 'Id']],
            [['SectionID'], 'exist', 'skipOnError' => true, 'targetClass' => Sections::className(), 'targetAttribute' => ['SectionID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'MenuID' => 'Menu ID',
            'ItemNameEn' => 'Item Name En',
            'ItemNameSw' => 'Item Name Sw',
            'LinkUrl' => 'Link Url',
            'ParentItemID' => 'Parent Item ID',
            'LostOrder' => 'Lost Order',
            'SectionID' => 'Section ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['Id' => 'MenuID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Sections::className(), ['Id' => 'SectionID']);
    }
}
