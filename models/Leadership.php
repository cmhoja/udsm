<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_leadership".
 *
 * @property integer $Id
 * @property string $Photo
 * @property string $FName
 * @property string $LNames
 * @property string $PositionEn
 * @property string $PositionSw
 * @property string $SummaryEn
 * @property string $SummarySw
 * @property integer $ListOrder
 * @property integer $Status
 */
class Leadership extends \yii\db\ActiveRecord {

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_leadership';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['FName', 'LNames', 'PositionEn', 'PositionSw', 'ListOrder'], 'required'],
            [['SummaryEn', 'SummarySw','LinkToPage'], 'string'],
            [['ListOrder', 'Status'], 'integer'],
            [['Photo'], 'file', 'maxFiles' => 1, 'extensions' => 'jpg,jpeg,png',],
            [['Photo', 'LNames'], 'string', 'max' => 255],
            [['FName', 'PositionEn', 'PositionSw'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'Photo' => 'Photo',
            'FName' => 'Fname',
            'LNames' => 'Lnames',
            'PositionEn' => 'Position En',
            'PositionSw' => 'Position Sw',
            'SummaryEn' => 'Summary En',
            'SummarySw' => 'Summary Sw',
            'ListOrder' => 'List Order',
            'Status' => 'Status',
            'LinkToPage'=>'Link to Page or Website'
        ];
    }

    static function getActiveLeaders() {

        return self::find()
                        ->where(['Status' => self::STATUS_PUBLISHED])
                        ->orderBy('ListOrder ASC')
                        ->all();
    }
    
     function getStatusList() {
        return array(
            self::STATUS_SAVED => 'Saved',
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_UNPUBLISHED => 'Un Published'
        );
    }
    
     function getStatusName() {
        $statuses = self::getStatusList();
        if ($statuses && isset($statuses[$this->Status])) {
            return $statuses[$this->Status];
        }
        return NULL;
    }

}
