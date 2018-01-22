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
            [['DetailsEn', 'DetailsSw', 'FundingEn', 'FundingSw',], 'string'],
            [['StartYear', 'EndYear'], 'safe'],
            [['ProjectNameSw', 'OtherResearcher', 'ProjectNameEn', 'FundingEn', 'FundingSw',], 'string', 'max' => 255],
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
            'FundingEn' => 'Funding(En)',
            'FundingSw' => 'Funding(Sw)',
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

    static function getProjectsByUnitID($UnitID = NULL) {
        $condition = $columns = NULL;
        if ($UnitID) {
            $columns = 'UnitID=:UnitID';
            $condition = array(
                ':UnitID' => $UnitID
            );
        }

        return self::find()
                        ->select('Id,ProjectNameEn,ProjectNameSw,ProjectLinkUrl,PageLinkUrl,UnitID,StartYear,Principal,FundingEn,FundingSw')
                        ->where($columns, $condition)
                        ->orderBy('UnitID')
                        ->all();
    }

    static function getProjectsDetailsByLinkUrl($PageLinkUrl) {
        $condition = array(
            ':PageLinkUrl' => $PageLinkUrl
        );

        return self::find()->where('PageLinkUrl=:PageLinkUrl', $condition)->one();
    }

    static function getProjectByKeyWordUnitTypeFieldsOfStudy($Keyword = NULL, $UnitID = NULL, $lang = NULL) {
        $condition = $where = $orderBy = NULL;
        if (!empty($lang)) {
            switch ($lang) {
                case 'sw':
                    $orderBy = 'ProjectNameSw ASC';
                    break;

                default:
                    $orderBy = 'ProjectNameEn ASC';
                    break;
            }
        }
        if ($UnitID > 0) {
            $where['UnitID'] = $UnitID;
        }

        return self::find()
                        ->where($where)
                        ->andFilterCompare('ProjectNameEn', $Keyword, 'LIKE')
                        ->andFilterCompare('ProjectNameSw', $Keyword, 'LIKE')
                        ->orderBy($orderBy)
                        ->all();
    }

    static function getProgrameDetailsByProgrammeUrl($ProjectLinkUrl) {
        $condition = array('ProjectLinkUrl' => $ProjectLinkUrl);
        return self::find()->where($condition)->one();
    }

}
