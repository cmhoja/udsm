<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_documents".
 *
 * @property integer $Id
 * @property integer $DocumentType
 * @property string $DocumentNameEn
 * @property string $DocumentNameSw
 * @property string $DatePublished
 * @property string $Attachment
 * @property integer $UnitID
 * @property integer $Status
 */
class Documents extends \yii\db\ActiveRecord {

    const DOC_TYPE_ANNUAL_REPORT = 1;
    const DOC_TYPE_PUBLICATION_BOOKS = 2;
    const DOC_TYPE_PUBLICATION_JOURNALS = 3;
    const DOC_TYPE_POLICY_GUIDELINE = 4;
    const DOC_TYPE_ALMANAC_PROSPECTUS = 5;
////document status
    Const DOC_STATUS_SAVED = 0;
    Const DOC_STATUS_PUBLISHED = 1;
    Const DOC_STATUS_UNPUBLISHED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_documents';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['DocumentType', 'DocumentNameEn', 'DocumentNameSw', 'Attachment', 'Status'], 'required'],
            [['DocumentType', 'UnitID', 'Status'], 'integer'],
            [['DatePublished'], 'safe'],
            [['DocumentNameEn', 'DocumentNameSw', 'Attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'DocumentType' => 'Document Type',
            'DocumentNameEn' => 'Document Name En',
            'DocumentNameSw' => 'Document Name Sw',
            'DatePublished' => 'Date Published',
            'Attachment' => 'Attachment',
            'UnitID' => 'Unit ID',
            'Status' => 'Status',
        ];
    }

    static function getActiveDocumentsByTypeAndUnit($DocType = NULL, $UnitID = NULL, $Status = NULL) {
        $condition = array();
        if ($DocType) {
            $condition['DocumentType'] = $DocType;
        }
        if ($UnitID) {
            $condition['UnitID'] = $UnitID;
        }
        if ($Status) {
            $condition['Status'] = $Status;
        }
        return self::find()
                        ->where($condition)
                        ->orderBy('Id DESC')
                        ->all();
    }

    static function getDocumentTypes($lang = NULL) {
        if (isset($lang)) {
            switch ($lang) {
                case 'sw':
                    return array(
                        self::DOC_TYPE_ANNUAL_REPORT => 'Ripoti Ya Mwaka',
                        self::DOC_TYPE_PUBLICATION_BOOKS => 'Vitabu/Machapisho',
                        // self::DOC_TYPE_PUBLICATION_JOURNALS => 'Journal',
                        self::DOC_TYPE_POLICY_GUIDELINE => ' Sera/Mwongozo',
                        self::DOC_TYPE_ALMANAC_PROSPECTUS => 'Takwimu/Prospectus',
                    );

                    break;

                default:
                    return array(
                        self::DOC_TYPE_ANNUAL_REPORT => 'Annual Report',
                        self::DOC_TYPE_PUBLICATION_BOOKS => 'Books',
                        // self::DOC_TYPE_PUBLICATION_JOURNALS => 'Journals',
                        self::DOC_TYPE_POLICY_GUIDELINE => ' Policy/Guideline',
                        self::DOC_TYPE_ALMANAC_PROSPECTUS => 'Almanac/Prospectus',
                    );
                    break;
            }
        }
    }

    function getDocumentType($lang = NULL) {
        $items = self::getDocumentTypes($lang);
        if (isset($items[$this->DocumentType])) {
            return $items[$this->DocumentType];
        }
        return NULL;
    }

}
