<?php

namespace app\models;

use Yii;

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
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TitleEn', 'DetailsEn'], 'required'],
            [['DetailsEn', 'DetailsSw'], 'string'],
            [['UnitID'], 'integer'],
            [['TitleEn', 'TitleSw'], 'string', 'max' => 100],
            [['Attachment', 'Photo'], 'string', 'max' => 200],
            [['UnitID'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicAdministrativeUnit::className(), 'targetAttribute' => ['UnitID' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'TitleEn' => 'Title En',
            'TitleSw' => 'Title Sw',
            'DetailsEn' => 'Details En',
            'DetailsSw' => 'Details Sw',
            'Attachment' => 'Attachment',
            'Photo' => 'Photo',
            'UnitID' => 'Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(AcademicAdministrativeUnit::className(), ['Id' => 'UnitID']);
    }
}
