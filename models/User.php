<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    private static $users = [];

//        '100' => [
//            'id' => '100',
//            'username' => 'admin',
//            'password' => 'admin',
//            'authKey' => 'test100key',
//            'accessToken' => '100-token',
//        ],
//        '101' => [
//            'id' => '101',
//            'username' => 'demo',
//            'password' => 'demo',
//            'authKey' => 'test101key',
//            'accessToken' => '101-token',
//        ],
//    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username, $password) {
        $users = [];
        $user = Users::find()->where('UserName=:UserName AND Password=:Password', [':UserName' => $username, ':Password' => $password])->one();

        if ($user) {
            //self::$users[$user->Id]=[];
            //$this->id= $user->Id;
            $user_details= new User;
            $user_details->id=$user->Id;
            $user_details->username=$user->UserName;
            $user_details->accessToken='dAG@as'.\app\components\Utilities::generateRandomString(35).'8Msx3';
            $user_details->authKey=\app\components\Utilities::generateRandomString(50);
            $user_details->password= $user->Password;
//         
            return $user_details;
           //return \yii\web\User::setIdentity($user_details);
           // return new static($user_details);
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === $password;
    }

}
