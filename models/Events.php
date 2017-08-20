<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_events".
 *
 * @property string $DateCreated
 * @property string $EventUrl
 * @property string $EventTitleEn
 * @property string $EventTitleSw
 * @property string $DescriptionEn
 * @property string $DescriptionSw
 * @property string $StartDate
 * @property string $EndDate
 * @property integer $Id
 * @property integer $UnitID
 * @property string $Attachment
 * @property integer $Status
 * @property string $DatePosted
 */
class Events extends \yii\db\ActiveRecord {

    //events status
    const EVENT_STATUS_SAVED = 0;
    const EVENT_STATUS_PUBLISHED = 1;
    const EVENT_STATUS_UNPUBLISHED = 2;
    ///Event type
    const EVENT_TYPE_GENERIC_EVENT = 0;
    const EVENT_TYPE_STUDENT_EVENT = 1;
    const EVENT_TYPE_STAFF_EVENT = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_events';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['DateCreated', 'StartDate', 'EndDate', 'DatePosted'], 'safe'],
            [['EventUrl', 'EventTitleEn', 'EventTitleSw', 'DescriptionEn', 'DescriptionSw', 'StartDate'], 'required'],
            [['DescriptionEn', 'DescriptionSw'], 'string'],
            [['UnitID', 'Status'], 'integer'],
            [['Attachment'], 'file', 'maxFiles' => 1, 'extensions' => 'docx, doc, pdf,xlsx,xls,odt, jpg,jpeg',],
            [['EventTitleEn', 'EventTitleSw'], 'string', 'max' => 130],
            [['EventUrl', 'Attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'DateCreated' => 'Date Created',
            'EventUrl' => 'Event Url',
            'EventTitleEn' => 'Event Title En',
            'EventTitleSw' => 'Event Title Sw',
            'DescriptionEn' => 'Description En',
            'DescriptionSw' => 'Description Sw',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
            'Id' => 'ID',
            'UnitID' => 'Unit ID',
            'Attachment' => 'Attachment',
            'Status' => 'Status',
            'DatePosted' => 'Date Posted',
        ];
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
            self::EVENT_STATUS_SAVED => 'Saved',
            self::EVENT_STATUS_PUBLISHED => 'Published',
            self::EVENT_STATUS_UNPUBLISHED => 'Un Published'
        );
    }

    static function getLatestEventsByStatusAndUnit($Status, $UnitID = NULL, $limit = NULL, $EventType = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        if (!is_null($EventType) && $EventType >= 0) {
            $condition['EventType'] = $EventType;
        }
        return self::find()->select('EventUrl,EventTitleEn,EventTitleSw,DescriptionEn,DescriptionSw,StartDate,DatePosted')->where($condition)->limit($limit)->orderBy('DatePosted DESC')->all();
    }

    static function getEventTypes() {
        return array(
            self::EVENT_TYPE_GENERIC_EVENT => 'Generic Events',
            self::EVENT_TYPE_STUDENT_EVENT => 'Student Events',
            self::EVENT_TYPE_STAFF_EVENT => 'Staff Events'
        );
    }

}
