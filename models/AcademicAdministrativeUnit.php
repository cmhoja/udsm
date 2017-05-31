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
class AcademicAdministrativeUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_academic_administrative_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UnitNameEn'], 'required'],
            [['UnitType'], 'integer'],
            [['UnitNameEn', 'UnitNameSw'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'UnitNameEn' => 'Unit Name En',
            'UnitNameSw' => 'Unit Name Sw',
            'UnitType' => 'Unit Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblContacts()
    {
        return $this->hasMany(Contacts::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMenus()
    {
        return $this->hasMany(Menu::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblNews()
    {
        return $this->hasMany(News::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProgrammes()
    {
        return $this->hasMany(Programmes::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblResearchProjects()
    {
        return $this->hasMany(ResearchProjects::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSlideShows()
    {
        return $this->hasMany(SlideShows::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSocialMediaAccounts()
    {
        return $this->hasMany(SocialMediaAccounts::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblStaffLists()
    {
        return $this->hasMany(StaffList::className(), ['UnitID' => 'Id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsers()
    {
        return $this->hasMany(User::className(), ['UnitID' => 'Id']);
    }
}
