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
        $session = Yii::$app->session;
        if ($session->get('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
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
            $model->Upload = \yii\web\UploadedFile::getInstance($model, 'Upload');
            if ($model->validate()) {
                if ($model->Upload) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_' . $model->TitleEn . '.' . $model->Upload->extension);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;

                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT' . $model->UnitID . '_' . $model->TitleEn . '.' . $model->Upload->extension);
                        $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_units_site'] . '/' . $fileName;
                    }
                    if ($model->Upload->saveAs($filePath)) {
                        $model->Image = $fileName;
                        //resize the image to a required size
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 1200, 600, 90);
                    }
                }
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
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
        $Image = NULL;
        if ($model && $model->Status == SlideShows::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }

        $session = Yii::$app->session;
        if ($session->get('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
        }
        if ($model) {
            $Image = $model->Image;
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
            $model->Upload = \yii\web\UploadedFile::getInstance($model, 'Upload');
            if ($model->validate()) {
                if ($model->Upload) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_' . $model->TitleEn . '.' . $model->Upload->extension);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;

                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT' . $model->UnitID . '_' . $model->TitleEn . '.' . $model->Upload->extension);
                        $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_units_site'] . '/' . $fileName;
                    }
                    if ($model->Upload->saveAs($filePath)) {
                        $model->Image = $fileName;
                        //resize the image to a required size
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 1200, 600, 90);
                        //  Image::getImagine()->open($filePath)->thumbnail(new Box($newWidth, $newHeight))->save($filePath, ['quality' => 90]);
                    }
                } else {
                    $model->Image = $Image;
                }
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
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
            $model->save(FALSE);
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = SlideShows::findOne($id);

        if ($model->Status == SlideShows::STATUS_PUBLISHED) {
            $model->Status = SlideShows::STATUS_UNPUBLISHED;
            $model->DatePosted = NULL;
            $model->save(false);
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
