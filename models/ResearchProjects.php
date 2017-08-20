<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_research_projects".
 *
 * @property integer $Id
 * @property string $ProjectNameEn
 * @property string $ProjectNameSw
 * @property integer $UnitID
 * @property string $DetailsEn
 * @property string $DetailsSw
 * @property string $Principal
 * @property string $OtherResearcher
 * @property string $Funding
 * @property string $StartYear
 * @property string $EndYear
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class ResearchProjects extends \yii\db\ActiveRecord {

    //status
    const PROJECT_STATUS_SAVED = 0;
    const PROJECT_STATUS_PUBLISHED = 1;
    const PROJECT_STATUS_UNPUBLISHED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_research_projects';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ProjectNameEn', 'ProjectNameSw', 'UnitID', 'DetailsEn', 'DetailsSw', 'ProjectLinkUrl'], 'required'],
            [['UnitID'], 'integer'],
            [['DetailsEn', 'DetailsSw'], 'string'],
            [['StartYear', 'EndYear'], 'safe'],
            [['ProjectNameSw', 'OtherResearcher', 'ProjectNameEn', 'Funding'], 'string', 'max' => 255],
            [['Principal'], 'string', 'max' => 50],
            [['ProjectLinkUrl'], 'unique'],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'ProjectNameEn' => 'Project Name (English)',
            'ProjectNameSw' => 'Project Name (Swahili)',
            'UnitID' => 'Unit ID',
            'DetailsEn' => 'Details (English)',
            'DetailsSw' => 'Details (Swahili)',
            'Principal' => 'Principal Researcher',
            'OtherResearcher' => 'Other/Supporting Researcher',
            'Funding' => 'Funding',
            'StartYear' => 'Start Year',
            'EndYear' => 'End Year',
            'ProjectLinkUrl' => 'Project Page Link Url'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }

    function getprogrammeStatusName() {
        $statuses = self::getProgrameStatusList();
        if ($statuses && isset($statuses[$this->Status])) {
            return $statuses[$this->Status];
        }
        return NULL;
    }

    static function getProgrameStatusList() {
        return array(
            self::PROJECT_STATUS_SAVED => 'Saved',
            self::PROJECT_STATUS_PUBLISHED => 'Published',
            self::PROJECT_STATUS_UNPUBLISHED => 'Un Published'
        );
    }

}
