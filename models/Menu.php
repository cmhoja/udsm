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
class Menu extends \yii\db\ActiveRecord {

    const MENU_TYPE_MAIN_MENU = 0;
    const MENU_TYPE_SIDE_MENU = 1;
    const MENU_TYPE_OTHER_MENU = 2;
    ///status
    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['MenuName', 'MenuType', 'MenuPlacementAreaRegion'], 'required'],
            [['MenuType', 'UnitID'], 'integer'],
            [['MenuName'], 'string', 'max' => 50],
            [['ShowOnPage'], 'string', 'max' => 300],
            [['Description'], 'string', 'max' => 255],
            [['MenuName'], 'unique'],
            [['MenuCSSClass', 'DisplayNameEn', 'DisplayNameSw'], 'safe'],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'MenuName' => 'Menu Name',
            'DisplayNameEn' => 'Display Name En',
            'DisplayNameSw' => 'Display Name Sw',
            'Description' => 'Description',
            'MenuType' => 'Menu Type',
            'UnitID' => 'Academic Units/Section',
            'ShowOnPage' => 'Show Menu only on Page',
            'MenuPlacementAreaRegion' => 'Menu Placement Area',
            'MenuCSSClass' => 'Menu CSS Class'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMenuItems() {
        return $this->hasMany(MenuItem::className(), ['MenuID' => 'Id']);
    }

    static function getMenuTypes() {
        return array(
            self::MENU_TYPE_MAIN_MENU => 'Website Main Menu',
            self::MENU_TYPE_SIDE_MENU => 'Page Side Menu',
            self::MENU_TYPE_OTHER_MENU => 'Other Menu',
        );
    }

    function getMenuTypeName() {
        $type = self::getMenuTypes();
        if ($type && isset($type[$this->MenuType])) {
            return $type[$this->MenuType];
        }return NULL;
    }

    function getStatusName() {
        $statuses = self::getStatusList();
        if ($statuses && isset($statuses[$this->Status])) {
            return $statuses[$this->Status];
        }
        return NULL;
    }

    function getStatusList() {
        return array(
            self::STATUS_SAVED => 'Saved',
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_UNPUBLISHED => 'Un Published'
        );
    }

    static function getActivemenuByRegionMenuTypePageType($RegionId, $MenuType, $PageType, $Unit = NULL) {
        return self::find()
                        ->select('MenuName,Description,Id')
                        ->where(array('MenuType' => $MenuType, 'ShowOnPage' => $PageType, 'MenuPlacementAreaRegion' => $RegionId, 'Status' => Menu::STATUS_PUBLISHED))
                        ->all();
    }

    static function getActiveMenuByMenuTypeRegionAndTemplateByUnitID($MenuType, $MenuPlacementAreaRegion, $UnitID = NULL, $ShowOnPage = 0) {
        $condition = array();
        $condition['Status'] = Menu::STATUS_PUBLISHED;
        if (empty($ShowOnPage) OR is_null($ShowOnPage) OR $ShowOnPage == '*') {
            $ShowOnPage = NULL;
        }
        if ($UnitID) {
            $condition['UnitID'] = $UnitID;
        } else {
            $condition['UnitID'] = NULL;
        }
        $condition['MenuType'] = $MenuType;
        $condition['MenuPlacementAreaRegion'] = $MenuPlacementAreaRegion;

        return self::find()
                        ->select('Id, MenuName,MenuType,UnitID,ShowOnPage,MenuPlacementAreaRegion')
                        ->where($condition)
                        ->andFilterWhere(['like', 'ShowOnPage', $ShowOnPage])
                        ->orderBy('Id ASC,MenuName ASC')
                        ->all();
    }

    static function getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID($MenuType, $MenuPlacementAreaRegion, $UnitID = NULL, $ShowOnPage = 0) {
        $condition = array();
        $condition['Status'] = Menu::STATUS_PUBLISHED;
        if (empty($ShowOnPage) OR is_null($ShowOnPage) OR $ShowOnPage == '*') {
            $ShowOnPage = NULL;
        }
        if ($UnitID) {
            $condition['UnitID'] = $UnitID;
        } else {
            $condition['UnitID'] = NULL;
        }
        $condition['MenuType'] = $MenuType;
        $condition['MenuPlacementAreaRegion'] = $MenuPlacementAreaRegion;

        return self::find()
                        ->select('Id, MenuName,DisplayNameEn,DisplayNameSw,MenuCSSClass')
                        ->where($condition)
                        ->andFilterWhere(['like', 'ShowOnPage', $ShowOnPage])
                        ->orderBy('Id ASC,MenuName ASC')
                        ->all();
    }

    function getRegionName() {
        $regions = \app\components\SiteRegions::getAllPlacementRegions();
        if (isset($regions[$this->MenuPlacementAreaRegion])) {
            return $regions[$this->MenuPlacementAreaRegion];
        }

        return NULL;
    }

}
