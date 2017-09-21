<?php

namespace app\components;

use yii\web\ForbiddenHttpException;

class Controller extends \yii\web\Controller {

    public function beforeAction($action) {
        $controller = \Yii::$app->controller->id;
        $action = \Yii::$app->controller->action->id;
        $controller_action = "/" . \Yii::$app->controller->id . "/" . $action;
        if (\Yii::$app->user->can($controller_action)) {
            return true;
        } else {
            $this->redirect(['/site/forbidden']);
        }
    }

    public function init() {
        if (\Yii::$app->session->has('language')) {
            Yii::$app->language = Yii::$app->session->get('language');
        } else {
            Yii::$app->language = Yii::$app->request->getPreferredLanguage($this->supportedLanguages);
            Yii::$app->session->set('language', Yii::$app->language);
        }
        if ($this->pattern !== null) {
            $this->pattern = Yii::$app->language.'/' . $this->pattern;
            // for subdomain it should be:
            // $this->pattern =  'http://<language>.example.com/' . $this->pattern,
        }
        $this->defaults['language'] = Yii::$app->request->getPreferredLanguage();
        parent::init();
    }

}
