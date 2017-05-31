<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_programmes".
 *
 * @property integer $Id
 * @property string $ProgrammeNameEn
 * @property string $ProgrammeNameSw
 * @property string $ProgrammeUrl
 * @property string $Duration
 * @property string $DescriptionEn
 * @property string $DescriptionSw
 * @property integer $UnitID
 * @property string $EntryRequirements
 * @property string $ProgrammeType
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class Programmes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_programmes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProgrammeNameEn', 'ProgrammeUrl', 'Duration', 'DescriptionEn', 'UnitID', 'ProgrammeType'], 'required'],
            [['DescriptionEn', 'DescriptionSw', 'EntryRequirements'], 'string'],
            [['UnitID'], 'integer'],
            [['ProgrammeNameEn', 'ProgrammeNameSw', 'ProgrammeUrl'], 'string', 'max' => 100],
            [['Duration'], 'string', 'max' => 45],
            [['ProgrammeType'], 'string', 'max' => 50],
            [['ProgrammeNameEn'], 'unique'],
            [['ProgrammeUrl'], 'unique'],
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
            'ProgrammeNameEn' => 'Programme Name En',
            'ProgrammeNameSw' => 'Programme Name Sw',
            'ProgrammeUrl' => 'Programme Url',
            'Duration' => 'Duration',
            'DescriptionEn' => 'Description En',
            'DescriptionSw' => 'Description Sw',
            'UnitID' => 'Unit ID',
            'EntryRequirements' => 'Entry Requirements',
            'ProgrammeType' => 'Programme Type',
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
