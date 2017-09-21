<?php

namespace app\components;

use Yii;

//use yii\web\Controller;
//use yii\base\BootstrapInterface;

class LanguageSelector extends \yii\base\Component {

    public function init() {
        Utilities::setvisitorLanguage();
        parent::init();
    }

}

?>