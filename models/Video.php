<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_video".
 *
 * @property integer $Id
 * @property string $VideoNameEn
 * @property string $VideoNameSw
 * @property integer $UnitID
 * @property string $VideoLink
 * @property integer $Status
 */
class Video extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_video';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['VideoNameEn', 'VideoNameSw', 'VideoLink'], 'required'],
            [['UnitID', 'Status'], 'integer'],
            [['VideoNameEn', 'VideoNameSw', 'VideoLink'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'VideoNameEn' => 'Video Name En',
            'VideoNameSw' => 'Video Name Sw',
            'UnitID' => 'Unit/Section',
            'VideoLink' => 'Video Link or Embed Code',
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

    static function getLatestVideosByStatusAndUnit($Status, $UnitID = NULL,$limit = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        return self::find()->select('VideoNameEn,VideoNameSw,VideoLink,DatePosted')->where($condition)->orderBy('DatePosted DESC')->all();
    }

}
