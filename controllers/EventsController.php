<?php

namespace app\controllers;

use Yii;
use app\models\Events;
use app\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller {

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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Events();
        if (Yii::$app->session->has('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->EventTitleEn = strtolower($model->EventTitleEn);
            $model->EventTitleSw = strtolower($model->EventTitleSw);
            if ($model->EventTitleEn) {
                $model->EventUrl = \app\components\Utilities::createUrlString($model->EventTitleEn);
            }
            $model->Status = Events::EVENT_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Events::EVENT_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Events::EVENT_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
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
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == Events::EVENT_STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if (Yii::$app->session->has('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->EventTitleEn = strtolower($model->EventTitleEn);
            $model->EventTitleSw = strtolower($model->EventTitleSw);
            if ($model->EventTitleEn) {
                $model->EventUrl = \app\components\Utilities::createUrlString($model->EventTitleEn);
            }
            $model->Status = Events::EVENT_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Events::EVENT_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Events::EVENT_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
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
     * Deletes an existing Events model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != Events::EVENT_STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = Events::findOne($id);
        if ($model->Status == Events::EVENT_STATUS_SAVED OR $model->Status == Events::EVENT_STATUS_UNPUBLISHED) {
            $model->Status = Events::EVENT_STATUS_PUBLISHED;
            $model->DatePosted = Date('Y-m-d H:i:s', time());
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = Events::findOne($id);
        if ($model->Status == Events::EVENT_STATUS_PUBLISHED) {
            $model->Status = Events::EVENT_STATUS_UNPUBLISHED;
            $model->DatePosted = NULL;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
