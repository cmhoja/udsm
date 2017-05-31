<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_menu".
 *
 * @property integer $Id
 * @property string $MenuName
 * @property string $Description
 * @property integer $MenuType
 * @property integer $UnitID
 * @property string $ShowOnPage
 *
 * @property TblAcademicAdministrativeUnit $unit
 * @property TblMenuItem[] $tblMenuItems
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MenuName', 'MenuType'], 'required'],
            [['MenuType', 'UnitID'], 'integer'],
            [['MenuName', 'ShowOnPage'], 'string', 'max' => 50],
            [['Description'], 'string', 'max' => 255],
            [['MenuName'], 'unique'],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'MenuName' => 'Menu Name',
            'Description' => 'Description',
            'MenuType' => 'Menu Type',
            'UnitID' => 'Unit ID',
            'ShowOnPage' => 'Show On Page',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMenuItems()
    {
        return $this->hasMany(MenuItem::className(), ['MenuID' => 'Id']);
    }
}
