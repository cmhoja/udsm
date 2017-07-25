<?php

namespace app\controllers;

use Yii;
use app\models\StaffList;
use app\models\StaffListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StaffListController implements the CRUD actions for StaffList model.
 */
class StaffListController extends Controller {

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
     * Lists all StaffList models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new StaffListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StaffList model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new StaffList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new StaffList();

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = StaffList::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = StaffList::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = StaffList::STATUS_PUBLISHED;
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
     * Updates an existing StaffList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == StaffList::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = StaffList::STATUS_SAVED;
            if (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = StaffList::STATUS_PUBLISHED;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing StaffList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != StaffList::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the StaffList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaffList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = StaffList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = StaffList::findOne($id);
        if ($model->Status == StaffList::STATUS_SAVED OR $model->Status == StaffList::STATUS_UNPUBLISHED) {
            $model->Status = StaffList::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = StaffList::findOne($id);
        if ($model->Status == StaffList::STATUS_PUBLISHED) {
            $model->Status = StaffList::STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
