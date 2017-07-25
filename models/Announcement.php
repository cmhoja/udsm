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
            [['TitleEn', 'TitleSw', 'Attachment'], 'string', 'max' => 255],
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

    static function getLatestAnnouncementsByStatusAndUnit($Status, $UnitID = NULL,$limit = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        return self::find()->select('TitleEn,TitleSw,DetailsEn,DetailsSw,DatePosted,LinkUrl')->where($condition)->limit($limit)->orderBy('DatePosted DESC')->all();
    }

}
