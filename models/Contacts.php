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
class Contacts extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ContactTitle','ContactTitleSw', 'PhoneNo'], 'required'],
            [['GoogleMapCode'], 'string'],
            [['PoBox', 'StreetRegion','Descriptions','DescriptionsSw'], 'safe'],
            [['UnitID'], 'integer'],
            [['ContactTitle','ContactTitleSw'], 'string', 'max' => 255],
            [['PhoneNo', 'FaxNo'], 'string', 'max' => 255],
            [['EmailAddress'], 'string', 'max' => 250],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'ContactTitle' => 'Contact Title EN',
            'Descriptions'=>'Descriptions EN',
            'ContactTitleSw' => 'Contact Title Sw',
            'DescriptionsSw'=>'Descriptions SW',
            'PhoneNo' => 'Phone No',
            'FaxNo' => 'Fax No',
            'EmailAddress' => 'Email Address',
            'PoBox' => ' P.O.Box',
            'StreetRegion' => 'Street/Ward/Region',
            'GoogleMapCode' => 'Google Map Code',
            'UnitID' => 'Unit ID',
            'Status' => 'Status'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
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

    static function getActiveMainSiteContacts() {
        return self::find()->where(['Status' => self::STATUS_PUBLISHED, 'UnitID' => NULL])->one();
    }

    static function getActiveOtherUnitsContacts() {
        return self::find()->where(['Status' => self::STATUS_PUBLISHED, 'UnitID' => '>0'])->all();
    }

}
