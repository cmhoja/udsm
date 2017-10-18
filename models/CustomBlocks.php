<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_custom_blocks".
 *
 * @property integer $Id
 * @property integer $BlockUnitID
 * @property integer $BlockType
 * @property string $BlockTitleEn
 * @property string $BlockTitleSw
 * @property string $BlockDetailsEn
 * @property string $BlockDetailsSw
 * @property string $BlockIconPicture
 * @property string $BlockIconVideo
 * @property string $LinkToPage
 * @property integer $BlockPlacementAreaRegion
 * @property string $ShowOnPage
 * @property integer $Status
 */
class CustomBlocks extends \yii\db\ActiveRecord {

    public $Upload;

    const STATUS_SAVED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_UNPUBLISHED = 2;
    //block types
    const BLOCK_TYPE_HOME_PAGE = 1;
    const BLOCK_TYPE_CUSTOM_PAGE = 2;

    ///holders for plavement regions based  on block types
//    public $BlockPlacementAreaRegion2;
//    public $BlockPlacementAreaRegion1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_custom_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['BlockType', 'BlockName', 'BlockDetailsEn', 'BlockDetailsSw', 'BlockPlacementAreaRegion'], 'required'],
            [['BlockUnitID', 'BlockType', 'Status'], 'integer'],
            [['BlockPlacementAreaRegion'], 'string', 'max' => 10],
            [['BlockDetailsSw'], 'string'],
            [['Upload'], 'file', 'maxFiles' => 1, 'extensions' => 'png, jpg,jpeg', 'mimeTypes' => 'image/jpeg, image/png',],
            [['BlockIconCSSClass'], 'safe'],
            [['BlockIconCSSClass', 'BlockTitleEn', 'BlockTitleSw'], 'string', 'max' => 100],
            [['BlockIconPicture', 'BlockIconVideo', 'LinkToPage', 'ShowOnPage'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'Id' => 'ID',
            'BlockUnitID' => 'Block Unit ID',
            'BlockType' => 'Block Type',
            'BlockName' => 'Block Administrative Name',
            'BlockTitleEn' => 'Block Display Heading En',
            'BlockTitleSw' => 'Block Display Heading Sw',
            'BlockDetailsEn' => 'Block Content En',
            'BlockDetailsSw' => 'Block Content Sw',
            'BlockIconPicture' => 'Block Icon Picture',
            'BlockIconCSSClass' => 'Block Icon CSS Class',
            'BlockIconVideo' => 'Block Icon(Embeded) Video',
            'LinkToPage' => 'Link To Page',
            'BlockPlacementAreaRegion' => 'Placement Region',
            'ShowOnPage' => 'Show On Page',
            'Status' => 'Status',
            'Upload' => 'Block Icon Picture'
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

    static function getBlockTypes() {
        return array(
            self::BLOCK_TYPE_CUSTOM_PAGE => 'Custom Page Block',
            self::BLOCK_TYPE_HOME_PAGE => 'Main/Home Page Block',
        );
    }

    function getBlockTypeName() {
        $blocktypes = self::getBlockTypes();
        if ($blocktypes && isset($blocktypes[$this->BlockType])) {
            return $blocktypes[$this->BlockType];
        }
        return NULL;
    }

    function getRegionName() {
        $regions = \app\components\SiteRegions::getAllPlacementRegions();
        if (isset($regions[$this->BlockPlacementAreaRegion])) {
            return $regions[$this->BlockPlacementAreaRegion];
        }
        return NULL;
    }

    static function getActiveBlocksByRegionId($RegionID, $BlockType, $ShowOnPage = 0, $BlockUnitID = NULL) {
        $condition = array(
            'BlockType' => $BlockType,
            'BlockPlacementAreaRegion' => $RegionID,
            'BlockUnitID' => $BlockUnitID,
            'Status' => CustomBlocks::STATUS_PUBLISHED
        );
        if ($ShowOnPage == 0) {
            $condition['ShowOnPage'] = $ShowOnPage;
        }
        return self::find()
                        ->select('BlockName,BlockTitleEn,BlockTitleSw,BlockDetailsEn,BlockDetailsSw,BlockIconPicture,BlockIconCSSClass,LinkToPage,BlockIconVideo')
                        ->where($condition)
                        ->andFilterWhere(['like', 'ShowOnPage', $ShowOnPage])
                        ->all();
    }

}
