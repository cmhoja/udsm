<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_logs".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $datecreated
 * @property string $activitydetails
 * @property integer $activitygroup
 *
 * @property TblUser $user
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId', 'activitygroup'], 'integer'],
            [['DateCreated'], 'safe'],
            [['ActivityDetails', 'activitygroup'], 'required'],
            [['ActivityDetails'], 'string'],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['UserId' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'Id' => 'Id',
            'UserId' => 'UserId',
            'DateCreated' => 'Date Created',
            'ActivityDetails' => 'Activity Details',
            'ActivityGroup' => 'Activity Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['Id' => 'UserId']);
    }
}
