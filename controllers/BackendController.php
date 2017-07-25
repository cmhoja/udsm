<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;

class BackendController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function init() {
        $this->layout = 'backend/main';
        parent::init();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('//backend/index');
        } else {
            return $this->redirect(['backend/login']);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        //$this->layout = 'login'; //loading the login layout
        if (!Yii::$app->user->isGuest) {
            // return $this->goHome();
            return $this->render('//backend/index');
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $password = $model->password;
            if ($model->password) {
                $model->password = \app\components\Utilities::setHashedValue($model->password);
            }

            // echo $model->password;

            if ($model->login()) {

                $userRoles = Users::find(array('Password' => $model->password, 'Username' => $model->username))->one();
                if ($userRoles) {
                    if ($userRoles->UnitID) {
                        \Yii::$app->session->set('UNIT_ID', $userRoles->UnitID);
                    } else {
                        \Yii::$app->session->destroy('UNIT_ID');
                    }
                    switch ($userRoles->UserType) {
                        case Users::USER_TYPE_ADMINISTRATOR: //administrator
                            \Yii::$app->session->set('USER_TYPE_ADMINISTRATOR', TRUE);

                            break;

                        case Users::USER_TYPE_CONTENT_MANAGER: //for content admin
                            \Yii::$app->session->set('USER_TYPE_CONTENT_MANAGER', TRUE);
                            break;

                        default:
                            break;
                    }
                }


                /* Logs the Logins History */
                $loginsModel = new \app\models\Logins();
                $loginsModel->UserId = \yii::$app->user->identity->id;
                $loginsModel->IpAddress = Yii::$app->getRequest()->getUserIP();
                $loginsModel->Details = 'User logged into the system successful using browser :-' . Yii::$app->getRequest()->getUserAgent();
                $loginsModel->save();
//            return $this->goBack();
                return $this->render('//backend/index');
            } else {
                $model->password = $password;
            }
        }
        $this->layout = 'backend/login';
        return $this->render('//backend/login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        /* Logs the Logins History */
        $loginsModel = new \app\models\Logins();
        $loginsModel->UserId = Yii::$app->user->id;
        $loginsModel->IpAddress = Yii::$app->getRequest()->getUserIP();
        $loginsModel->Details = 'User logged out the system successful using browser :- ' . Yii::$app->getRequest()->getUserAgent();
        $loginsModel->save();

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays forbidden page.
     *
     * @return string
     */
    public function actionForbidden() {
        return $this->render('forbidden');
    }

}
