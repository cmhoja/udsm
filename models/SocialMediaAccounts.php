<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_social_media_accounts".
 *
 * @property integer $Id
 * @property string $AccountName
 * @property string $AccountAddress
 * @property string $AccountLogoClass
 * @property integer $UnitID
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class SocialMediaAccounts extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 3;
    ///Accout types
    const ACC_TYPE_FACEBOOK = 1;
    const ACC_TYPE_TWITTER = 2;
    const ACC_TYPE_LINKEDIN = 3;
    const ACC_TYPE_YOUTUBE = 4;
    const ACC_TYPE_GOOGLE_PLUS = 5;
    const ACC_TYPE_INSTAGRAM = 6;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_social_media_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['AccountName', 'AccountAddress', 'AccountLogoClass', 'AccountType'], 'required'],
            [['UnitID'], 'integer'],
            [['AccountName', 'AccountLogoClass'], 'string', 'max' => 200],
            [['AccountAddress'], 'string', 'max' => 255],
            [['AccountName'], 'unique'],
            [['AccountAddress'], 'unique'],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'AccountType' => 'Account Type',
            'AccountName' => 'Account Name',
            'AccountAddress' => 'Account Address',
            'AccountLogoClass' => 'Account Logo Class',
            'UnitID' => 'Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(TblAcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
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

    function getAccTypeName() {
        $statuses = self::getStatusList();
        if ($statuses && isset($statuses[$this->Status])) {
            return $statuses[$this->Status];
        }
        return NULL;
    }

    function getAccTypeList() {
        return array(
            self::ACC_TYPE_FACEBOOK => 'FaceBook A/C',
            self::ACC_TYPE_TWITTER => 'Twitter A/C',
            self::ACC_TYPE_LINKEDIN => 'LinkedIn A/C',
            self::ACC_TYPE_YOUTUBE => 'Youtube A/C',
            self::ACC_TYPE_GOOGLE_PLUS => 'Google Plus',
            self::ACC_TYPE_INSTAGRAM => 'Instagram'
        );
    }

    /*
     * returns obejct for eqach social media account if aparticular unit
     */

    static function getActiveAccountsByUnitID($UnitID = NULL) {
        if (!is_null($UnitID) && $UnitID) {
            $condition = array('Status' => self::STATUS_PUBLISHED, 'UnitID' => $UnitID);
        } else {
            $condition = array('Status' => self::STATUS_PUBLISHED, 'UnitID' => NULL);
        }
        return self::find()->select('AccountName,AccountAddress,AccountLogoClass,AccountType')->where($condition)->all();
    }

    static function getAccoutLinkByTypeAndUnitID($AccountType, $Status, $UnitID = NULL) {
        $condition = array('AccountType' => $AccountType, 'Status' => $Status);
        if (!is_null($UnitID) && $UnitID > 0) {
            $condition['UnitID'] = $UnitID;
        }
        $data = self::find()
                ->select('AccountAddress')
                ->where($condition)
                ->one();
        if ($data) {
            return $data->AccountAddress;
        }
        return NULL;
    }

}
