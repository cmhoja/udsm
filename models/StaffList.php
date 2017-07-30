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
class StaffList extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_staff_list';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['FName', 'LName', 'Education'], 'required'],
            [['UnitID'], 'integer'],
            [['FName', 'LName'], 'string', 'max' => 45],
            [['Education', 'Summary'], 'string'],
            [['Position'], 'string', 'max' => 100],
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
            'LName' => 'Last Names',
            'Education' => 'Education History',
            'Position' => 'Current Job Position(s)',
            'Summary' => 'Current Summarised CV',
            'UnitID' => 'Dept/Section/Unit',
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

}
