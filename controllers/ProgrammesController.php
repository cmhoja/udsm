<?php

namespace app\controllers;

use Yii;
use app\models\Programmes;
use app\models\ProgrammesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgrammesController implements the CRUD actions for Programmes model.
 */
class ProgrammesController extends Controller {

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
     * Lists all Programmes models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProgrammesSearch();
        if (Yii::$app->session->has('UNIT_ID')) {
            $searchModel->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programmes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Programmes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Programmes();
        if (Yii::$app->session->has('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Programmes::PROGRAME_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Programmes::PROGRAME_STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Programmes::PROGRAME_STATUS_PUBLISHED;
            }
            if (!empty($model->ProgrammeNameEn)) {
                $model->ProgrammeUrl = \app\components\Utilities::createUrlString($model->ProgrammeNameEn);
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
     * Updates an existing Programmes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == Programmes::PROGRAME_STATUS_PUBLISHED) {
            return $this->redirect(['index']);
        }
        $oldname = $model->ProgrammeNameEn;
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Programmes::PROGRAME_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Programmes::PROGRAME_STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Programmes::PROGRAME_STATUS_PUBLISHED;
            }
            if (!empty($model->ProgrammeNameEn)) {
                $model->ProgrammeUrl = \app\components\Utilities::createUrlString($model->ProgrammeNameEn);
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
     * Deletes an existing Programmes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != Programmes::PROGRAME_STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Programmes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Programmes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Programmes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = Programmes::findOne($id);
        if ($model->Status == Programmes::PROGRAME_STATUS_SAVED OR $model->Status == Programmes::PROGRAME_STATUS_UNPUBLISHED) {
            $model->Status = Programmes::PROGRAME_STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = Programmes::findOne($id);
        if ($model->Status == Programmes::PROGRAME_STATUS_PUBLISHED) {
            $model->Status = Programmes::PROGRAME_STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
