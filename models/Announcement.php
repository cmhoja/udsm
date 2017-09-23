<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_announcement".
 *
 * @property integer $Id
 * @property string $TitleEn
 * @property string $TitleSw
 * @property string $DetailsEn
 * @property string $DetailsSw
 * @property string $Attachment
 * @property string $DatePosted
 * @property integer $Status
 */
class Announcement extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;
    //Announcement type
    const ANNOUNCEMENT_TYPE_GENERIC_ANNOUNCEMENT = 0;
    const ANNOUNCEMENT_TYPE_STUDENT_ANNOUNCEMENT = 1;
    const ANNOUNCEMENT_TYPE_STAFF_ANNOUNCEMENT = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['TitleEn', 'TitleSw', 'DetailsEn', 'DetailsSw'], 'required'],
            [['DetailsEn', 'DetailsSw'], 'string'],
            [['DatePosted'], 'safe'],
            [['Status'], 'integer'],
            [['Attachment'], 'file', 'maxFiles' => 1, 'skipOnEmpty' => true], // 'extensions' => 'zip, pdf, .docx, .doc, ppt, odt, .xlsx, .xls'],
            [['TitleEn', 'TitleSw'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'TitleEn' => 'Title En',
            'TitleSw' => 'Title Sw',
            'DetailsEn' => 'Details En',
            'DetailsSw' => 'Details Sw',
            'Attachment' => 'Attachment',
            'DatePosted' => 'Date Posted',
            'Status' => 'Status',
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
            self::STATUS_SAVED => 'Saved',
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_UNPUBLISHED => 'Un Published'
        );
    }

    static function getLatestAnnouncementsByStatusAndUnit($Status, $UnitID = NULL, $limit = NULL, $Type = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        if ($Type >= 0) {
            $condition['AnnouncementType'] = $Type;
        }
        return self::find()->select('TitleEn,TitleSw,DetailsEn,DetailsSw,DatePosted,LinkUrl')->where($condition)->limit($limit)->orderBy('DatePosted DESC')->all();
    }

    /*
     * provides other announcements other than the one shown
     */

    static function getLatestOtherAnnouncementsByIDStatusAndUnit($Id, $Status, $UnitID = NULL, $limit = NULL, $Type = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        if ($Type >= 0) {
            $condition['AnnouncementType'] = $Type;
        }
        return self::find()->select('TitleEn,TitleSw,DetailsEn,DetailsSw,DatePosted,LinkUrl')->where($condition)->andWhere(['<>', 'Id', $Id])->limit($limit)->orderBy('DatePosted DESC')->all();
    }

    static function getAnnouncementTypes() {
        return array(
            self::ANNOUNCEMENT_TYPE_GENERIC_ANNOUNCEMENT => 'General Announcemnt',
            self::ANNOUNCEMENT_TYPE_STUDENT_ANNOUNCEMENT => 'Student Announcement',
            self::ANNOUNCEMENT_TYPE_STAFF_ANNOUNCEMENT => 'Staff Announcement'
        );
    }

}
