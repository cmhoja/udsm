<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_slide_shows".
 *
 * @property integer $Id
 * @property string $TitleEn
 * @property string $TitleSw
 * @property string $DetailsEn
 * @property string $DetailsSw
 * @property string $LinkToPage
 * @property string $Image
 * @property integer $UnitID
 * @property integer $Status
 *
 * @property TblAcademicAdministrativeUnit $unit
 */
class SlideShows extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;

    public $Upload;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_slide_shows';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['TitleEn', 'TitleSw','Upload'], 'required'],
            [['UnitID', 'Status'], 'integer'],
            [['TitleEn', 'TitleSw', 'LinkToPage'], 'string', 'max' => 120],
            [['DetailsEn', 'DetailsSw'], 'string', 'max' => 400],
            [['Upload'], 'file','maxFiles' => 1, 'extensions' => 'png, jpg,jpeg','mimeTypes' => 'image/jpeg, image/png',],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
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
            'LinkToPage' => 'Link to Page',
            'Image' => 'Image',
            'UnitID' => 'Unit/Section',
            'Status' => 'Status',
            'Upload'=>'Upload Picture'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit() {
        return $this->hasOne(TblAcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
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

    public function uploadPhoto() {
        if ($this->validate() && $this->Image) {
            $this->Photo->saveAs(\Yii::$app->params['file_upload'] . $this->Image->baseName . '.' . $this->Image->extension);
//           echo $this->Photo->baseName . '.' . $this->Photo->extension;
//           exit;
            return $this->Image->baseName . '.' . $this->Image->extension;
        }
        return false;
    }

    static function getActiveLastestSlideShowsByUnitID($UnitID = NULL, $Limit = NULL) {
        $condition = array();
        $condition['Status'] = self::STATUS_PUBLISHED;
        $condition['UnitID'] = $UnitID;

        return self::find()
                        ->select('TitleEn,TitleSw,DetailsEn,DetailsSw,LinkToPage,Image')
                        ->where($condition)
                        ->orderBy('DatePosted DESC')
                        ->limit($Limit)
                        ->all();
    }

}
