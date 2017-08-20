<?php

namespace app\models;

use yii\base\Model;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tbl_news".
 *
 * @property integer $Id
 * @property string $TitleEn
 * @property string $TitleSw
 * @property string $DetailsEn
 * @property string $DetailsSw
 * @property string $Attachment
 * @property string $Photo
 * @property integer $UnitID
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class News extends \yii\db\ActiveRecord {

    const NEWS_STATUS_SAVED = 0;
    const NEWS_STATUS_PUBLISHED = 1;
    const NEWS_STATUS_UNPUBLISHED = 2;
    //NEWS TYPES
    const NEWS_TYPE_GENERIC_NEWS = 0;
    const NEWS_TYPE_STUDENT_NEWS = 1;
    const NEWS_TYPE_STAFF_NEWS = 2;

//    public $Photo;
//    public $Attachment;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_news';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['TitleEn', 'DetailsEn', 'TitleSw', 'DetailsSw', 'Status'], 'required'],
            [['DetailsEn', 'DetailsSw'], 'string'],
            [['UnitID', 'Status'], 'integer'],
            [['TitleEn', 'TitleSw'], 'string', 'max' => 150],
            [['NewsType'], 'safe'],
            [['Photo'], 'file', 'maxFiles' => 1, 'skipOnEmpty' => false, 'extensions' => 'png,jpeg,jpg'],
            [['Attachment'], 'file', 'maxFiles' => 1, 'skipOnEmpty' => true], // 'extensions' => 'zip, pdf, .docx, .doc, ppt, odt, .xlsx, .xls'],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'TitleEn' => 'Title (English)',
            'TitleSw' => 'Title (Swahili)',
            'DetailsEn' => 'Details (English)',
            'DetailsSw' => 'Details (Swahili)',
            'Attachment' => 'Attachment (News Attachment)',
            'Photo' => 'Photo (News Picture)',
            'UnitID' => 'Unit',
            'Status' => 'Status',
            'NewsType' => 'News Type'
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
            self::NEWS_STATUS_SAVED => 'Saved',
            self::NEWS_STATUS_PUBLISHED => 'Published',
            self::NEWS_STATUS_UNPUBLISHED => 'Un Published'
        );
    }

    public function uploadAttachment() {
        if ($this->validate() && $this->Attachment) {
            $this->Attachment->saveAs(\Yii::$app->params['file_upload'] . $this->Attachment->baseName . '.' . $this->Attachment->extension);
            return $this->Attachment->baseName . '.' . $this->Attachment->extension;
        }
        return false;
    }

    static function getLatestNewsByStatusAndUnit($Status, $UnitID = NULL, $limit = NULL, $NewsType = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        if (!is_null($NewsType) && $NewsType >= 0) {
            $condition['NewsType'] = $NewsType;
        }
        return self::find()
                        ->select('LinkUrl,TitleEn,TitleSw,DetailsEn,DetailsSw,Photo,DatePosted')
                        ->where($condition)
                        ->limit($limit)
                        ->orderBy('DatePosted DESC')
                        ->all();
    }

    static function getNewsTypes() {
        return array(
            self::NEWS_TYPE_GENERIC_NEWS => 'Generic News',
            self::NEWS_TYPE_STUDENT_NEWS => 'Student News',
            self::NEWS_TYPE_STAFF_NEWS => 'Staff News'
        );
    }

}
