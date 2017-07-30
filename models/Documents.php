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
    const DOC_TYPE_BOOKS = 2;
    const DOC_TYPE_ANNUAL_REPORT_RESEARCH_POLICY_GUIDELINE = 3;
    const DOC_TYPE_ALMANAC_PROSPOECTUS = 4;

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

    static function getActiveDocumentsByTypeAndUnit($DocType, $UnitID = NULL) {
        return self::find()
                        ->where(array('DocumentType' => $DocType, 'UnitID' => $UnitID))
                        ->orderBy('Id DESC')
                        ->all();
    }

}
