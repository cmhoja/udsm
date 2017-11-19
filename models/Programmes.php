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
class Programmes extends \yii\db\ActiveRecord {

    const PROGRAME_TYPE_UNDERGRADUATE = 1;
    const PROGRAME_TYPE_POSTUNDERGRADUATE = 2;
    const PROGRAME_TYPE_NON_DEGREE = 3;
    //status
    const PROGRAME_STATUS_SAVED = 0;
    const PROGRAME_STATUS_PUBLISHED = 1;
    const PROGRAME_STATUS_UNPUBLISHED = 2;

    public $ProgrameName;
    public $PTYpe;
    public $FieldStudy;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_programmes';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ProgrammeNameEn', 'ProgrammeNameSw', 'Duration', 'DurationSw', 'ProgrammeUrl', 'DescriptionEn', 'DescriptionSw', 'UnitID', 'ProgrammeType', 'FieldOfStudy', 'Status'], 'required'],
            [['DescriptionEn', 'DescriptionSw', 'EntryRequirements'], 'string'],
            [['UnitID'], 'integer'],
            [['ProgrammeNameEn', 'ProgrammeNameSw', 'ProgrammeUrl'], 'string', 'max' => 100],
            [['Duration'], 'string', 'max' => 45],
            [['ProgrammeNameEn'], 'unique'],
            [['ProgrameName', 'PTYpe', 'FieldStudy'], 'safe'],
            [['ProgrammeUrl'], 'unique'],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'ProgrammeNameEn' => 'Programme Name (English)',
            'ProgrammeNameSw' => 'Programme Name (Swahili)',
            'ProgrammeUrl' => 'Page Link',
            'Duration' => 'Duration EN',
            'DurationSw' => 'Duration SW',
            'DescriptionEn' => 'Description (English)',
            'DescriptionSw' => 'Description (Swahili)',
            'UnitID' => 'Offered By',
            'EntryRequirements' => 'Entry Requirements EN',
            'EntryRequirementsSw' => 'EntryRequirements SW',
            'ProgrammeType' => 'Programme Type',
            'FieldOfStudy' => 'Field Of Study'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }

    static function getProgrameTypesList($lang = NULL) {
        switch ($lang) {
            case 'sw':
                return array(
                    self::PROGRAME_TYPE_UNDERGRADUATE => 'Shahada ya kwanza',
                    self::PROGRAME_TYPE_POSTUNDERGRADUATE => 'Shahada ya Uzamivu',
                    self::PROGRAME_TYPE_NON_DEGREE => 'Kozi Fupi/Isiyo ya Shahada'
                );
                break;

            default :
                return array(
                    self::PROGRAME_TYPE_UNDERGRADUATE => 'Undergraduate Program',
                    self::PROGRAME_TYPE_POSTUNDERGRADUATE => 'Post Graduate Program',
                    self::PROGRAME_TYPE_NON_DEGREE => 'Non degree Program'
                );
                break;
        }
    }

    function getProgrammeTypeName($lang = NULL) {
        $data = self::getProgrameTypesList($lang);
        if ($data && isset($data[$this->ProgrammeType])) {
            return $data[$this->ProgrammeType];
        }
        return NULL;
    }

    function getprogrammeStatusName() {
        $statuses = self::getProgrameStatusList();
        if ($statuses && isset($statuses[$this->Status])) {
            return $statuses[$this->Status];
        }
        return NULL;
    }

    static function getProgrameStatusList() {
        return array(
            self::PROGRAME_STATUS_SAVED => 'Saved',
            self::PROGRAME_STATUS_PUBLISHED => 'Published',
            self::PROGRAME_STATUS_UNPUBLISHED => 'Un Published'
        );
    }

    static function getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword = NULL, $UnitID = NULL, $Type = NULL, $FieldOfStudy = NULL, $lang = NULL) {
        $condition = $where = $orderBy = NULL;

        if (!empty($Type) && $Type > 0) {
            $where['ProgrammeType'] = $Type;
        }

        if (!empty($FieldOfStudy) && $FieldOfStudy > 0) {
            $where['FieldOfStudy'] = $FieldOfStudy;
        }
        if ($UnitID > 0) {
            $where['UnitID'] = $UnitID;
        }

        if (!empty($lang)) {
            switch ($lang) {
                case 'sw':
                    $orderBy = 'ProgrammeNameSw ASC';

                    break;

                default:
                    $orderBy = 'ProgrammeNameEn ASC';

                    break;
            }
        }

        return self::find()
                        ->where($where)
                        ->andFilterCompare('ProgrammeNameEn', $Keyword, 'LIKE')
                        ->andFilterCompare('ProgrammeNameSw', $Keyword, 'LIKE')
                        ->orderBy($orderBy)
                        ->all();
    }

    static function getProgrameDetailsByProgrammeUrl($ProgrammeUrl) {
        $condition = array('ProgrammeUrl' => $ProgrammeUrl);
        return self::find()->where($condition)->one();
    }

    static function getFieldOfStudyByValue($value) {
        $field_ofStudy = Yii::$app->params['static_items']['field_of_study'];
        if ($field_ofStudy && isset($field_ofStudy[$value])) {
            return $field_ofStudy[$value][Yii::$app->language];
        }
        return NULL;
    }

}
