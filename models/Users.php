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
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FName', 'LName', 'UserName', 'Password', 'UserType'], 'required'],
            [['UserType', 'UnitID'], 'integer'],
            [['FName', 'LName'], 'string', 'max' => 50],
            [['UserName'], 'string', 'max' => 20],
            [['Password'], 'string', 'max' => 255],
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
            'FName' => 'Fname',
            'LName' => 'Lname',
            'UserName' => 'User Name',
            'Password' => 'Password',
            'UserType' => 'User Type',
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
