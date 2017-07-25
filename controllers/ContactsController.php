<?php

namespace app\controllers;

use Yii;
use app\models\Contacts;
use app\models\ContactsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactsController implements the CRUD actions for Contacts model.
 */
class ContactsController extends Controller {

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
        ];
    }
    
     public function init() {
        $this->layout = 'backend/main';
        parent::init();
    }

    /**
     * Lists all Contacts models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ContactsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contacts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contacts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Contacts();
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Contacts::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Contacts::STATUS_PUBLISHED;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contacts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model -> Status == Contacts::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Contacts::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Contacts::STATUS_PUBLISHED;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contacts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model-> Status == Contacts::STATUS_SAVED OR $model->Status == Contacts::STATUS_UNPUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Contacts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contacts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Contacts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = Contacts::findOne($id);
        if ($model->Status == Contacts::STATUS_SAVED OR $model->Status == Contacts::STATUS_UNPUBLISHED) {
            $model->Status = Contacts::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = Contacts::findOne($id);
        if ($model->Status == Contacts::STATUS_PUBLISHED) {
            $model->Status = Contacts::STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
