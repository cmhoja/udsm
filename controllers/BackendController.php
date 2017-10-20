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
                // 'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'login', 'templates'],
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
        return $this->redirect(['backend/login']);
    }

    public function actionTemplates($opt) {
        $opt = NULL;
        if (Yii::$app->request->get('opt')) {
            $opt = Yii::$app->request->get('opt');
        }

        return $this->render('//backend/templates', array('opt' => $opt));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        //$this->layout = 'login'; //loading the login layout
        if (!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) {
            // return $this->goHome();
            return $this->render('//backend/index');
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $password = $model->password;
            $authType = Yii::$app->params['authType']; ///getting authentication type used
            $loggedin = FALSE;
            switch ($authType) {
                case 'ldap':
                    $exist = Users::find()->where('Username=:Username AND Status=:Status', array(':Username' => $model->username, ':Status' => Users::ACC_STATUS_ACTIVE))->one();
                    ///https://github.com/Adldap2/Adldap2
                    if ($exist) {
                        ///checking user details in ldap
                        $LdapSettings = \Yii::$app->params['LDap'];
                        $ldap_authenticate = \app\components\Utilities::lDapAuthenticate($LdapSettings, $model->username, $model->password);
                        if ($ldap_authenticate) {
                            $identity = \app\models\User::findByUsername($model->username);
                            $loggedin = Yii::$app->user->login($identity);
                        } else {
                            $sms = $ldap_authenticate['sms'];
                            Yii::$app->session->setFlash('sms', $sms);
                            $loggedin = FALSE;
                        }
                    } else {
                        //user not exist in our system
                        $sms = 'Account Doesnot exist, Please contact you administrator';
                        Yii::$app->session->setFlash('sms', $sms);
                        $loggedin = FALSE;
                    }


                    break;
                case 'system':

                    if ($model->password) {
                        $model->password = \app\components\Utilities::setHashedValue($model->password);
                    }
                    $identity = \app\models\User::findByUsernameAndPassword($model->username, $model->password);
//                    var_dump($identity);
//                    exit;
                    if ($identity) {
                        $loggedin = Yii::$app->user->login($identity);
                    } else {
                        $sms = 'Account doesnot exist, Please contact you administrator';
                        Yii::$app->session->setFlash('sms', $sms);
                        $loggedin = FALSE;
                    }
                    break;

                default :
                    $loggedin = NULL;
                    break;
            }


            if ($loggedin) {
                Yii::$app->user->identity->id = $identity->id;
                $userRoles = Users::find()->where('Username=:Username', array(':Username' => $model->username))->one();
                if ($userRoles) {
                    $session = Yii::$app->session;
                    if (!$session->isActive) {
                        // open a session
                        $session->open();
                    }
                    $session->set('UID', $userRoles->Id);
                    $session->set('U_NAME', $userRoles->UserName);
                    if ($userRoles->UnitID) {
                        $session->set('UNIT_ID', $userRoles->UnitID);
                        $UnitName = \app\models\AcademicAdministrativeUnit::getUnitNameById($userRoles->UnitID);
                        $session->set('UNIT_NAME', $UnitName);
                    } else {
                        $session->remove('UNIT_ID');
                    }
                    switch ($userRoles->UserType) {
                        case Users::USER_TYPE_ADMINISTRATOR: //administrator
                            $session->set('USER_TYPE_ADMINISTRATOR', TRUE);
                            $session->remove('USER_TYPE_CONTENT_MANAGER');
                            break;

                        case Users::USER_TYPE_CONTENT_MANAGER: //for content admin
                            $session->set('USER_TYPE_CONTENT_MANAGER', TRUE);
                            $session->remove('USER_TYPE_ADMINISTRATOR');
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
        if (Yii::$app->user->id) {
            $UserId = Yii::$app->user->id;
        } else {
            $UserId = Yii::$app->session->get('UID');
        }
        if ($UserId) {
            $loginsModel->UserId = $UserId;
            $loginsModel->IpAddress = Yii::$app->getRequest()->getUserIP();
            $loginsModel->Details = 'User logged out the system successful using browser :- ' . Yii::$app->getRequest()->getUserAgent();
            $loginsModel->save();
            $session = Yii::$app->session;
            $session->destroy();
            //$session->remove('UNIT_ID');
            if ($session->isActive) {
                // destroys all user data registered to a session.
                $session->destroy();
                /// close a session
                $session->close();
                Yii::$app->user->logout();
            }
        }
        return $this->redirect(['backend/login']);
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
        return $this->render('//site/forbidden');
    }

}
