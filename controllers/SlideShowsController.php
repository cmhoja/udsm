<?php

namespace app\controllers;

use Yii;
use app\models\SlideShows;
use app\models\SlideShowsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SlideShowsController implements the CRUD actions for SlideShows model.
 */
class SlideShowsController extends Controller {

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
     * Lists all SlideShows models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SlideShowsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SlideShows model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SlideShows model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SlideShows();
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->TitleEn = strtolower($model->TitleEn);
            $model->TitleSw = strtolower($model->TitleSw);
            $model->Status = SlideShows::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = SlideShows::STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = SlideShows::STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->save()) {
                $update = 0;
                if ($model->Image) {
                    $model->Image = UploadedFile::getInstance($model, 'Image');
                    $file_name = $model->uploadPhoto(); //uploading the Photo if any
                    if ($file_name) {
                        $model->Photo = $file_name;
                    }
                    $update++;
                }

                if ($update) {
                    $model->update();
                }
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing SlideShows model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == SlideShows::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->TitleEn = strtolower($model->TitleEn);
            $model->TitleSw = strtolower($model->TitleSw);
            $model->Status = SlideShows::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = SlideShows::STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = SlideShows::STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->save()) {
                $update = 0;
                if ($model->Image) {
                    $model->Image = UploadedFile::getInstance($model, 'Image');
                    $file_name = $model->uploadPhoto(); //uploading the Photo if any
                    if ($file_name) {
                        $model->Photo = $file_name;
                    }
                    $update++;
                }
                if ($update) {
                    $model->update();
                }
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SlideShows model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != SlideShows::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the SlideShows model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SlideShows the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SlideShows::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = SlideShows::findOne($id);
        if ($model->Status == SlideShows::STATUS_SAVED OR $model->Status == SlideShows::STATUS_UNPUBLISHED) {
            $model->Status = SlideShows::STATUS_PUBLISHED;
            $model->DatePosted = Date('Y-m-d H:i:s', time());
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = SlideShows::findOne($id);
        if ($model->Status == SlideShows::STATUS_PUBLISHED) {
            $model->Status = SlideShows::STATUS_UNPUBLISHED;
            $model->DatePosted = NULL;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
