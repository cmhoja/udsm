<?php

namespace app\components;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\helpers\Url;
//
//image resizing libraries
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * Description of Utilities component
 * This is Utililties/Helpers class containing the definitions of the functions/methods 
 * that are free to use with any class of this application
 * @author: charles 
 * @email: charlesmhoja@gmail.com
 * @date: April 27, 2013
 * @location: Inco Technologies (T) Ltd
 */
class Utilities {
    /*
     * generates a hashed/ encrypted value of the parameter passed in the function
     * param @value, the value to be hashed
     */

    static function setHashedValue($value) {
        $length = strlen($value);
        $middle = ($length / 2);
        if ($middle > 0) {
            $value1 = substr($value, 0, $middle - 1);
            $value2 = substr($value, $middle, $length - 1);
            $hashedvalue = sha1('2@!' . md5($value1) . $value2 . 'o&#');
        } else {
            $hashedvalue = sha1('2@!' . md5($value . 'o&#'));
        }
        return $hashedvalue;
    }

    /*
     * method to generate random alpha numeric string of a specified length( character size)
     * param @length : length( character size) of string to be generated
     */

    static function generateRandomString($length) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    /*
     * returns a random number for setting batch
     */

    public static function getRandomNumber() {
        return rand(10, 10000000);
    }

    /*
     * create an audit for each user activity
     */

//    public static function createActivityAudit($section, $description, $actionLevel, $actionLevelId) {
//        $model = new ActivityAudit;
//        $model->ActorId = (int) Yii::App()->user->getState('UID');
//        $model->ActivityLevel = (int) $actionLevel;
//        $model->ActivityLevelId = (int) $actionLevelId;
//        $model->Description = $description;
//        $model->ActivityType = (int) $section;
//
//        return $model->save();
//    }

    static function getPercentage($divider, $divident) {
        $percent = 0;
        if ($divider > 0 && $divident > 0) {
            $percent = 100 * ($divider / $divident);
        }
        return round($percent, 2);
    }

    /*
     * returns the number of days btn two dates
     * date format 'Y-m-d
     */

    static function getDateDifference($date1, $date2) {
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);
        $datediff = $date1 - $date2;
        return floor($datediff / (60 * 60 * 24));
    }

    static function generateNumbers($MaxValue) {
        $numbers = array();
        for ($i = 1; $i <= $MaxValue; $i++) {
            $numbers[$i] = $i;
        }
        return $numbers;
    }

    static function createUrlString($string) {
        $string = trim($string);
        $string = strtolower($string);
        $string = preg_replace('/\s+/', '-', $string);
        $string = str_replace("'", '', $string);
        $string = str_replace("&", 'and', $string);
        $string = str_replace("?", '', $string);
        return $string;
    }

    static function generateUrl($string) {
        if (filter_var($string, FILTER_VALIDATE_URL)) {
            // if (strpos($string, 'http://.') >= 0 OR strpos($string, 'https://.') >= 0) {
            $string = \yii\helpers\Url::to($string);
            return $string;
        } else {
            if ($string == 'site/index.php' OR $string == 'web/index.php' OR $string == '<front>' OR $string == 'home/page') {
                return Yii::$app->homeUrl;
            }
        }
        return \yii\helpers\Url::toRoute($string);
    }

    static function getPageUrl() {
        $request_url_pattern = \yii\helpers\Html::encode(trim(Yii::$app->request->url));
        $request_url_pattern = explode('index.php', $request_url_pattern);
        $page_link = NULL;
        if (isset($request_url_pattern[1])) {
            if (empty($request_url_pattern[1]) OR ( $request_url_pattern[1] == '/') OR ( $request_url_pattern[1] == '<front>') OR ( $request_url_pattern[1] == '/%3Cfront%3E')) {
                $page_link = NULL;
            } else {
                if (strpos($request_url_pattern[1], '/') == 0) {
                    $page_link = $request_url_pattern[1]; //substr($request_url_pattern[1], 1);
                } else {
                    $page_link = $request_url_pattern[1];
                }
            }
        }
        return $page_link;
    }

    /*
     * resize and image and maintains an aspect ratio
     */

    static function ResizeImage($OriginalFilePath, $NewfilePath, $newWidth, $newHeight, $quality) {

        Image::getImagine()->open($OriginalFilePath)->thumbnail(new Box($newWidth, $newHeight))->save($NewfilePath, ['quality' => $quality]);
    }

    static function getProgramFieldOfStudy($lang = NULL) {
        $list = array();
        $field_of_study = Yii::$app->params['field_of_study'];
        if (is_array($field_of_study)) {
            if (is_null($lang)) {
                $lang = 'en'; //setting default language to english
            }

            foreach ($field_of_study as $key => $value) {
                $list[$key] = $value[$lang];
            }
        }
        return $list;
    }

    static function getFieldOfStudyNameByValue($lang = NULL, $value) {
        $fiels_of_study = self::getProgramFieldOfStudy($lang);
        if ($fiels_of_study && $value) {
            return $fiels_of_study[$value];
        }
        return NULL;
    }

    static function setLanguageLink($key) {
        $key = \yii\helpers\Html::encode($key);
        $page = '/site/index';
        $user_url = \yii\helpers\Html::encode(Yii::$app->request->pathInfo);
        if ($user_url) {
            $page = '/' . $user_url;
        }
        $url = \yii\helpers\Html::encode('/site/language/?key=' . $key . '&page_url=' . $page);
        return \yii\helpers\Url::toRoute($url);
    }

    static function setvisitorLanguage() {
        if (Yii::$app->session->has('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        }
    }

    static function userUrl() {
        $url = Utilities::getPageUrl();
        if (empty($url) OR is_null($url) OR $url == '') {
            $url = Yii::$app->basePath;
            $url = '/';
        } else {
            $url_pattern = explode('?', $url);
            $url = $url_pattern[0];
        }
        return $url;
    }

    static function lDapAuthenticate($LdapSettings, $username, $password) {
        $host = $LdapSettings['host'];
        $dn = $LdapSettings['dn'];
        $username = \yii\helpers\HtmlPurifier::process($username);
        $password = \yii\helpers\HtmlPurifier::process($password);
        //connecting to the ldap server
        $ldap_connect = ldap_connect($host);
        if ($ldap_connect) {
            ldap_set_option($ldap_connect, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldap_connect, LDAP_OPT_REFERRALS, 0);
            $ldaprdn = $username;     // normal user
            if (isset($LdapSettings['domain'])) {
                $domain = $LdapSettings['domain'];
                $ldaprdn = $username . '@' . $domain;   // ldap rdn or dn
            }
            $bind = @ldap_bind($ldap_connect, $username, $password);
            if ($bind) {
                // log them in!
                return TRUE;
            } else {
                $sms = "Can not authenticate using the details provided Please contact youe administrator";
            }
        } else {
            $sms = "Failed to connect to the server, please contact your administrator";
        }
        return array('sms' => $sms, 'status' => FALSE);
    }

    static function getPageContentByUrl($url) {
        $url = trim($url);
        $page_content = \app\models\BasicPage::getActivePageDetailsByUrl($url);

        if (!$page_content) {
            $page_content = \app\models\BasicPage::getActivePageAllDetailsByPageSEOUrl(substr($url, 1));
        }
        if (!$page_content) {
            $page_content = \app\models\BasicPage::getActivePageAllDetailsByPageSEOUrl(substr($url, 0, (strlen($url) - 1)));
        }
        if (!$page_content) {
            $page_content = \app\models\BasicPage::getActivePageAllDetailsByPageSEOUrl(trim($url . '/'));
        }
        if (!$page_content) {
            $page_content = \app\models\BasicPage::getActivePageAllDetailsByPageSEOUrl(trim(substr($url, 1) . '/'));
        }
        return $page_content;
    }

    //end of class
}

?>
