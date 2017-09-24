<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of Authentication
 *
 * @author charles
 */
class Authentication extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        //checking the enabled authentication type
        $authMode = \Yii::$app()->params['authType'];  //getting authentication method to use

        switch ($authMode) {
            case 'ldap'://autheintication using ldap
                $LdapSettings = \Yii::$pp()->params['LDap']; //getting the array containing all the ldap settings fro  the main configuration file
                $host = $LdapSettings['host'];
                $dn = $LdapSettings['dn'];
                //connecting to the ldap server
                $ldap = ldap_connect($host) or die("Failed to connect to the server, please contact your administrator");
                $attributes = array("ou", "sn", "givenname", "mail", "name", "memberof", "userprincipalname");
                $filter = "userprincipalname=" . $this->username . "@tz.af.absa.local";
                ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
                ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                $found = false;  //setting to false as default the user existance state variable
                @ldap_bind($ldap, $this->username . "@tz.af.absa.local", $this->password);
                $result = @ldap_search($ldap, $dn, $filter, $attributes);
                $entries = @ldap_get_entries($ldap, $result);
                for ($i = 0; $i < @$entries[0]['memberof']['count']; $i++) {
                    if (strpos($entries[0]['memberof'][$i], "CN=AVID_USERS") !== false) {
                        $found = true;
                        break;
                    }
                }
                //checking if user exists in ldap
                if ($found == false) {
                    $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;  ///when user doesnot exist in ldap
                } else {////if user exists  in ldap
                    //checking user details exist in system database
                    $criteria = new CDbCriteria;
                    $criteria->compare('UniqueId', $this->username);
                    $user = Users::model()->find($criteria);
                    if ($user) {
                        $this->errorCode = self::ERROR_NONE;
                    } else {
                        $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                    }
                }
                break;
            case 'system':  ///for authication using the normal system authentication technique
                $criteria = new CDbCriteria;
                $criteria->compare('UserName', $this->username);
                $criteria->compare('Password', Utilities::setHashedValue($this->password));
                $user = User::model()->find($criteria);
                if ($user && $user->Status != 0) {
                    $this->_id = $user->Id;
                    Yii::app()->user->setState('userid', strtoupper($user->UserName));
                    $this->errorCode = self::ERROR_NONE;
                } else {
                    $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                }
                break;

            default :

                $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
                break;
        }


        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}

//end of class