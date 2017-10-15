<?php

namespace app\controllers;

use Yii;
use app\models\SocialMediaAccounts;
use app\models\SocialMediaAccountsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SocialMediaAccountsController implements the CRUD actions for SocialMediaAccounts model.
 */
class SocialMediaAccountsController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'publish', 'unPublish'],
                'rules' => [
                    [
                        'allow' => true,
                        // 'verbs' => ['post'],
                        // 'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return ((!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) && Yii::$app->session->has('USER_TYPE_ADMINISTRATOR') ) ? TRUE : FALSE;
                        },
                    ],
                ]
            ],
        ];
    }

    public function init() {
        $this->layout = 'backend/main';
        parent::init();
    }

    /**
     * Lists all SocialMediaAccounts models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SocialMediaAccountsSearch();
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $searchModel->UnitID = $session->get('UNIT_ID');
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SocialMediaAccounts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SocialMediaAccounts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SocialMediaAccounts();
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SocialMediaAccounts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->Status == SocialMediaAccounts::STATUS_PUBLISHED) {
            $this->redirect('');
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SocialMediaAccounts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->Status != SocialMediaAccounts::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the SocialMediaAccounts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SocialMediaAccounts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SocialMediaAccounts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = SocialMediaAccounts::findOne($id);
        if ($model->Status == SocialMediaAccounts::STATUS_SAVED OR $model->Status == SocialMediaAccounts::STATUS_UNPUBLISHED) {
            $model->Status = SocialMediaAccounts::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = SocialMediaAccounts::findOne($id);
        if ($model->Status == SocialMediaAccounts::STATUS_PUBLISHED) {
            $model = SocialMediaAccounts::findOne($id);
            if ($model->Status == SocialMediaAccounts::STATUS_PUBLISHED) {
                $model->Status = SocialMediaAccounts::STATUS_UNPUBLISHED;
                $model->save();
            }
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
