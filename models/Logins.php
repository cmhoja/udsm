<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "tbl_logins".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $ipaddress
 * @property string $details
 * @property string $datecreated
 *
 * @property TblUser $user
 */
class Logins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_logins';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId'], 'integer'],
            [['DateCreated'], 'safe'],
            [['IpAddress'], 'string', 'max' => 20],
            [['Details'], 'string', 'max' => 255],
            [['UserId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['UserId' => 'Id']],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'Id',
            'UserId' => 'User Id',
            'IpAddress' => 'Ip Address',
            'Details' => 'Details',
            'DateCreated' => 'Date Created',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['Id' => 'UserId']);
    }
}