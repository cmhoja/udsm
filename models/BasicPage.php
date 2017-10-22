<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_basic_page".
 *
 * @property integer $PageId
 * @property string $PageTitleEn
 * @property string $PageTitleSw
 * @property string $DescriptionEn
 * @property string $DescriptionSw
 * @property string $Attachment
 * @property string $EmbededVideo
 * @property string $PageSeoUrl
 * @property string $DateCreated
 * @property integer $Status
 * @property integer $UnitID
 */
class BasicPage extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_basic_page';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['PageTitleEn', 'PageTitleSw', 'DescriptionEn', 'DescriptionSw', 'Status'], 'required'],
            [['DescriptionEn', 'DescriptionSw'], 'string'],
            [['DateCreated', 'SectionLink'], 'safe'],
            [['Status', 'UnitID'], 'integer'],
            [['PageSeoUrl'], 'string', 'min' => 2],
            [['PageTitleEn', 'PageTitleSw', 'Attachment'], 'string', 'max' => 200],
            [['EmbededVideo', 'PageSeoUrl'], 'string', 'max' => 255],
            [['PageSeoUrl'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'PageId' => 'Page ID',
            'PageTitleEn' => 'Page Title En',
            'PageTitleSw' => 'Page Title Sw',
            'DescriptionEn' => 'Description En',
            'DescriptionSw' => 'Description Sw',
            'Attachment' => 'Page Doument/Attachment',
            'EmbededVideo' => 'Page Video(Embeded Video)',
            'PageSeoUrl' => 'Page Seo Url',
            'DateCreated' => 'Date Created',
            'Status' => 'Status',
            'UnitID' => 'Unit ID',
            'SectionLink' => 'Page Menu Section'
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

    static function getActivePageDetailsByUrl($url, $UnitID = NULL) {

        return self::find()
                        ->select('PageId,PageTitleEn,PageTitleSw,DescriptionEn,DescriptionSw,Attachment,EmbededVideo,PageSeoUrl,')
                        ->where(['PageSeoUrl' => $url, 'UnitID' => $UnitID, 'Status' => self::STATUS_PUBLISHED])
                        ->one();
    }

    static function getActivePageAllDetailsByPageSEOUrl($url) {

        return self::find()
                        ->where(['PageSeoUrl' => $url, 'Status' => self::STATUS_PUBLISHED])
                        ->one();
    }

    static function getActivePageAllDetailsByUrl($url, $UnitID = NULL) {

        return self::find()
                        ->where(['PageSeoUrl' => $url, 'UnitID' => $UnitID, 'Status' => self::STATUS_PUBLISHED])
                        ->one();
    }

    static function getSectionList($UnitID) {
        $section_list = array();
        $sections = MenuItem::getActiveMainMenuSectionsByUnitID($UnitID);
        if ($sections) {
            foreach ($sections as $section) {
                $sectionName = NULL;
                if ($section->UnitID) {
                    $sectionName = AcademicAdministrativeUnit::getUnitNameById($section->UnitID) . ' - ';
                } else {
                    $sectionName = 'Main Website - ';
                }
                $section_list[$section->Id] = $sectionName . $section->ItemNameEn . ' Menu';
            }
        }

        return $section_list;
    }

}
