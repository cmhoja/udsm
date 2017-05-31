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
class ResearchProjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_research_projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProjectNameEn', 'UnitID', 'DetailsEn'], 'required'],
            [['UnitID'], 'integer'],
            [['DetailsEn', 'DetailsSw'], 'string'],
            [['StartYear', 'EndYear'], 'safe'],
            [['ProjectNameEn', 'Funding'], 'string', 'max' => 255],
            [['ProjectNameSw', 'OtherResearcher'], 'string', 'max' => 45],
            [['Principal'], 'string', 'max' => 50],
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
            'ProjectNameEn' => 'Project Name En',
            'ProjectNameSw' => 'Project Name Sw',
            'UnitID' => 'Unit ID',
            'DetailsEn' => 'Details En',
            'DetailsSw' => 'Details Sw',
            'Principal' => 'Principal',
            'OtherResearcher' => 'Other Researcher',
            'Funding' => 'Funding',
            'StartYear' => 'Start Year',
            'EndYear' => 'End Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }
}
