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
            [['FName', 'LName', 'UserName', 'Password', 'UserType'], 'required'],
            [['UserType', 'UnitID'], 'integer'],
            [['FName', 'LName'], 'string', 'max' => 50],
             [['UnitID'], 'safe'],
            [['UserName'], 'string', 'max' => 20],
            [['Password'], 'string', 'max' => 255],
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
            'UserName' => 'User Name',
            'Password' => 'Password',
            'UserType' => 'User Type',
            'UnitID' => 'Unit/Department/College',
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
