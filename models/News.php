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
            [['TitleEn', 'TitleSw'], 'string', 'max' => 60],
            //[['Attachment', 'Photo'], 'string', 'max' => 200],
            [['Photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpeg,jpg'],
            [['Attachment'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip, pdf, docx, doc,ppt,odt,xlsx,xls'],
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
            'Status' => 'Status'
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

    public function uploadPhoto() {
        if ($this->validate() && $this->Photo) {
            $this->Photo->saveAs(\Yii::$app->params['file_upload'] . $this->Photo->baseName . '.' . $this->Photo->extension);
//           echo $this->Photo->baseName . '.' . $this->Photo->extension;
//           exit;
            return $this->Photo->baseName . '.' . $this->Photo->extension;
        }
        return false;
    }

    public function uploadAttachment() {
        if ($this->validate() && $this->Attachment) {
            $this->Attachment->saveAs(\Yii::$app->params['file_upload'] . $this->Attachment->baseName . '.' . $this->Attachment->extension);
            return $this->Attachment->baseName . '.' . $this->Attachment->extension;
        }
        return false;
    }

    static function getLatestNewsByStatusAndUnit($Status, $UnitID = NULL, $limit = NULL) {
        $condition = array('Status' => $Status, 'UnitID' => $UnitID);
        return self::find()->select('LinkUrl,TitleEn,TitleSw,DetailsEn,DetailsSw,Photo,DatePosted')->where($condition)->limit($limit)->orderBy('DatePosted DESC')->all();
    }

}
