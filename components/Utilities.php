<?php

namespace app\components;

use Yii;
use yii\web\ForbiddenHttpException;
use yii\helpers\Url;

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
        return $string;
    }

    static function generateUrl($string) {
        //if (strpos($string, 'www.') != FALSE OR strpos($string, 'http://.') != FALSE OR strpos($string, 'https://.') != FALSE) {
        if (filter_var($string, FILTER_VALIDATE_URL)) {
            return $string;
        } else {
            if ($string == 'site/index.php' OR $string == 'web/index.php' OR $string == '<front>' OR $string == 'home/page') {
                return Yii::$app->homeUrl;
            }
//            return \Yii::$app->getUrlManager()->createUrl($string);
        }
        return \yii\helpers\Url::toRoute($string);
    }

    static function getPageUrl() {
        $request_url_pattern = html_entity_decode(trim(Yii::$app->request->url));
        $request_url_pattern = explode('index.php', $request_url_pattern);
        $page_link = NULL;
        if (isset($request_url_pattern[1])) {
            if (empty($request_url_pattern[1]) OR ( $request_url_pattern[1] == '/') OR ( $request_url_pattern[1] == '<front>') OR ( $request_url_pattern[1] == '/%3Cfront%3E')) {
                
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

    //end of class
}

?>
