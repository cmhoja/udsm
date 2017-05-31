<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_staff_list".
 *
 * @property integer $Id
 * @property string $FName
 * @property string $LName
 * @property string $Education
 * @property string $Position
 * @property string $Summary
 * @property integer $UnitID
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class StaffList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_staff_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FName', 'LName', 'Education'], 'required'],
            [['UnitID'], 'integer'],
            [['FName', 'LName'], 'string', 'max' => 45],
            [['Education', 'Summary'], 'string', 'max' => 255],
            [['Position'], 'string', 'max' => 100],
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
            'Education' => 'Education',
            'Position' => 'Position',
            'Summary' => 'Summary',
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
