<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_academic_administrative_unit".
 *
 * @property integer $Id
 * @property string $UnitNameEn
 * @property string $UnitNameSw
 * @property integer $UnitType
 *
 * @property TblContacts[] $tblContacts
 * @property TblMenu[] $tblMenus
 * @property TblNews[] $tblNews
 * @property TblProgrammes[] $tblProgrammes
 * @property TblResearchProjects[] $tblResearchProjects
 * @property TblSlideShows[] $tblSlideShows
 * @property TblSocialMediaAccounts[] $tblSocialMediaAccounts
 * @property TblStaffList[] $tblStaffLists
 * @property TblUser[] $tblUsers
 */
class AcademicAdministrativeUnit extends \yii\db\ActiveRecord {
    /*
     * constants
     */

    const UNIT_TYPE_ADMINISTRATIVE = 0;
    const UNIT_TYPE_CONSTINTUENT_COLLEGE = 1;
    const UNIT_TYPE_COLLEGE = 2;
    const UNIT_TYPE_SCHOOL = 3;
    const UNIT_TYPE_INSTITUTE = 4;
    const UNIT_TYPE_CENTRE = 5;
    const UNIT_TYPE_DEPARTMENT = 6;
    //content management type
    const CONTENTMANAGEMENT_INTERNAL = 1;
    const CONTENTMANAGEMENT_EXTERNAL = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_academic_administrative_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['UnitNameEn', 'UnitType', 'UnitNameSw', 'TypeContentManagement'], 'required'],
            [['UnitType'], 'integer'],
            ['UnitAbreviationCode', 'required', 'on' => 'require_unit_code'],
            [['ParentUnitId', 'Logo', 'UnitAbreviationCode'], 'safe'],
            [['UnitNameEn', 'UnitNameSw'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'UnitNameEn' => 'Unit Name EN',
            'UnitNameSw' => 'Unit Name SW',
            'UnitType' => 'Unit Type',
            'ParentUnitId' => 'Parent Unit',
            'TypeContentManagement' => 'Content Control Type'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblContacts() {
        return $this->hasMany(Contacts::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMenus() {
        return $this->hasMany(Menu::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNews() {
        return $this->hasMany(News::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProgrammes() {
        return $this->hasMany(Programmes::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblResearchProjects() {
        return $this->hasMany(ResearchProjects::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSlideShows() {
        return $this->hasMany(SlideShows::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSocialMediaAccounts() {
        return $this->hasMany(SocialMediaAccounts::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblStaffLists() {
        return $this->hasMany(StaffList::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsers() {
        return $this->hasMany(User::className(), ['UnitID' => 'Id']);
    }

    static function getUnitTypes() {
        return array(
            self::UNIT_TYPE_ADMINISTRATIVE => 'Administratives',
            self::UNIT_TYPE_CONSTINTUENT_COLLEGE => 'Constituent Colleges',
            self::UNIT_TYPE_COLLEGE => 'Colleges',
            self::UNIT_TYPE_SCHOOL => 'Schools',
            self::UNIT_TYPE_INSTITUTE => 'Institutes',
            self::UNIT_TYPE_CENTRE => 'Centres',
           // self::UNIT_TYPE_DEPARTMENT => 'Departments',
        );
    }

    function getUnitTypeName() {
        $types = self::getUnitTypes();
        if ($types && isset($types[$this->UnitType])) {
            return $types[$this->UnitType];
        }
        return NULL;
    }

    static function getParentUnitsList() {
        return self::find()->where(['ParentUnitId' => 0])->all(); //->order_by('UnitNameEn ASC');
    }

    Static function getUnitNameById($Id) {
        if ($Id) {
            $unit = self::findOne($Id); //->where(['Id'=>$this->ParentUnitId])->One();
            if ($unit) {
                switch (Yii::$app->language) {
                    case 'sw':
                        return $unit->UnitNameSw;
                        break;

                    default:
                        return $unit->UnitNameEn;
                        break;
                }
            }
        }
        return NULL;
    }

    function getParentUnitName() {
        if ($this->ParentUnitId) {
            $unit = self::findOne($this->ParentUnitId); //->where(['Id'=>$this->ParentUnitId])->One();
            if ($unit) {
                return $unit->UnitNameEn;
            }
        }
        return NULL;
    }

    static function getContentMangementTypes() {
        return array(
            self::CONTENTMANAGEMENT_INTERNAL => 'Central/Within CMS',
            self::CONTENTMANAGEMENT_EXTERNAL => 'External/Seprate Website',
        );
    }

    function getContentMangementTypesName() {
        $types = self::getContentMangementTypes();
        if ($types && isset($types[$this->TypeContentManagement])) {
            return $types[$this->TypeContentManagement];
        }
        return NULL;
    }

    /*
     * returns units bassed on based on the condition(array() arranged in hirrachy
     */

    static function getUnitesInHirrach($condition) {
        $condition1 = $condition2 = $condition;
        $condition1['ParentUnitId'] = 0;
        $ParentUnits = AcademicAdministrativeUnit::findAll($condition1);
        if ($ParentUnits) {
            $data = array();
            foreach ($ParentUnits as $parent) {
                $data[$parent->Id] = strtoupper($parent->UnitNameEn);
                $condition2['ParentUnitId'] = $parent->Id;
                $ChildUnits = AcademicAdministrativeUnit::findAll($condition2);
                foreach ($ChildUnits as $ChildUnit) {
                    $data[$ChildUnit->Id] = '----' . $ChildUnit->UnitNameEn;
                }
            }
            return $data;
        }
        return NULL;
    }

    static function getAcademicTopUnitsInHirrach() {
        $condition = array('ParentUnitId' => 0, 'TypeContentManagement' => self::CONTENTMANAGEMENT_INTERNAL);

        $ParentUnits = AcademicAdministrativeUnit::findAll($condition);
        if ($ParentUnits) {
            $data = array();
            foreach ($ParentUnits as $parent) {
                $data[$parent->Id] = strtoupper($parent->UnitNameEn);
            }
            return $data;
        }
        return NULL;
    }

    static function getUnitAbbreviationAndTypeByID($Id) {
        if ($Id) {
            $unit = self::find()->where(['Id' => $Id])->one();
            if ($unit && $unit->UnitAbreviationCode) {
                return array('abv' => strtolower($unit->UnitAbreviationCode), 'type' => strtolower($unit->getUnitTypeName()));
            }
        }
        return NULL;
    }

}
