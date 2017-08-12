<?php

namespace app\controllers;

use Yii;
use app\models\ResearchProjects;
use app\models\ResearchProjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResearchProjectsController implements the CRUD actions for ResearchProjects model.
 */
class ProjectsController extends Controller {

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
     * Lists all ResearchProjects models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ResearchProjectsSearch();
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
     * Displays a single ResearchProjects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ResearchProjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ResearchProjects();
        if ($model->load(Yii::$app->request->post())) {

            if ($model->ProjectNameEn) {
                $model->ProjectLinkUrl = \app\components\Utilities::createUrlString($model->ProjectNameEn);
            }
            $session = Yii::$app->session;
            if ($session->has('UNIT_ID')) {
                $model->UnitID = $session->get('UNIT_ID');
            }
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = ResearchProjects::PROJECT_STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = ResearchProjects::PROJECT_STATUS_PUBLISHED;
            }
            if ($model->ProjectNameEn) {
                $model->PageLinkUrl = \app\components\Utilities::createUrlString($model->ProjectNameEn);
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
     * Updates an existing ResearchProjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->Status == ResearchProjects::PROJECT_STATUS_PUBLISHED) {
            return $this->redirect(['index']);
        }
        if ($model->load(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            if ($session->has('UNIT_ID')) {
                $model->UnitID = $session->get('UNIT_ID');
            }
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = ResearchProjects::PROJECT_STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = ResearchProjects::PROJECT_STATUS_PUBLISHED;
            }
            if ($model->ProjectNameEn) {
                $model->PageLinkUrl = \app\components\Utilities::createUrlString($model->ProjectNameEn);
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
     * Deletes an existing ResearchProjects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model->Status != ResearchProjects::PROJECT_STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the ResearchProjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ResearchProjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ResearchProjects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = ResearchProjects::findOne($id);
        if ($model->Status == ResearchProjects::PROJECT_STATUS_SAVED OR $model->Status == ResearchProjects::PROJECT_STATUS_UNPUBLISHED) {
            $model->Status = ResearchProjects::PROJECT_STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = ResearchProjects::findOne($id);
        if ($model->Status == ResearchProjects::PROJECT_STATUS_PUBLISHED) {
            $model->Status = ResearchProjects::PROJECT_STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
