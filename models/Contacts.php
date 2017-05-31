<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_contacts".
 *
 * @property integer $Id
 * @property string $ContactTitle
 * @property string $PhoneNo
 * @property string $FaxNo
 * @property string $EmailAddress
 * @property string $GoogleMapCode
 * @property integer $UnitID
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ContactTitle', 'PhoneNo', 'EmailAddress'], 'required'],
            [['GoogleMapCode'], 'string'],
            [['UnitID'], 'integer'],
            [['ContactTitle'], 'string', 'max' => 25],
            [['PhoneNo', 'FaxNo'], 'string', 'max' => 15],
            [['EmailAddress'], 'string', 'max' => 50],
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
            'ContactTitle' => 'Contact Title',
            'PhoneNo' => 'Phone No',
            'FaxNo' => 'Fax No',
            'EmailAddress' => 'Email Address',
            'GoogleMapCode' => 'Google Map Code',
            'UnitID' => 'Unit ID',
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
