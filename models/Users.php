<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $Id
 * @property string $FName
 * @property string $LName
 * @property string $UserName
 * @property string $Password
 * @property integer $UserType
 * @property integer $UnitID
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class Users extends \yii\db\ActiveRecord {

    const USER_TYPE_ADMINISTRATOR = 1;
    const USER_TYPE_CONTENT_MANAGER = 2;
    ///account status options
    const ACC_STATUS_ACTIVE = 1;
    const ACC_STATUS_INACTIVE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['FName', 'LName', 'UserName', 'UserType', 'Status', 'EmailAddress'], 'required'],
            [['Password'], 'required', 'on' => 'require_user_password'],
            [['UserType', 'UnitID'], 'integer'],
            [['FName', 'LName'], 'string', 'max' => 50],
            [['UnitID'], 'safe'],
            [['UserName'], 'string', 'max' => 100],
            [['Password', 'EmailAddress'], 'string', 'max' => 255],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'FName' => 'First Name',
            'LName' => 'Last Name',
            'EmailAddress' => 'Email Address',
            'UserName' => 'User Name',
            'Password' => 'Password',
            'UserType' => 'User Type',
            'UnitID' => 'Unit/Department/College',
            'Status' => 'Status'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }

    static function getUserTypes() {
        return array(
            self::USER_TYPE_CONTENT_MANAGER => 'Content Manager',
            self::USER_TYPE_ADMINISTRATOR => 'Administrator',
        );
    }

    static function getUserStatuses() {
        return array(
            self::ACC_STATUS_ACTIVE => 'Active',
            self::ACC_STATUS_INACTIVE => 'In Active',
        );
    }

    function getUserStatusName() {
        $statuses = self::getUserStatuses();
        if (isset($statuses[$this->Status])) {
            return $statuses[$this->Status];
        }
        return NULL;
    }

    function getUserStatusNameByValue($Status) {
        $statuses = self::getUserStatuses();
        if (isset($statuses[$Status])) {
            return $statuses[$Status];
        }
        return NULL;
    }

    function getUserTypeName() {
        $types = self::getUserTypes();
        if ($types && isset($types[$this->UserType])) {
            return $types[$this->UserType];
        }
        return NULL;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword() {
        if ($this->Password) {
            $this->Password = \app\components\Utilities::setHashedValue($this->Password);
        }
    }

}
