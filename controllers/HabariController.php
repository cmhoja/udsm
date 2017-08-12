<?php

namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * NewsController implements the CRUD actions for News model.
 */
class HabariController extends Controller {

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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NewsSearch();
        $session = Yii::$app->session;
        if ($session['UNIT_ID']) {
            $searchModel->UnitID = $session['UNIT_ID'];
        }
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('//news/index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('//news/view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new News();
        $session = Yii::$app->session;
        if ($session['UNIT_ID']) {
            $model->UnitID = $session['UNIT_ID'];
        }
        $model->TitleEn = strtolower($model->TitleEn);
        $model->TitleSw = strtolower($model->TitleSw);
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = News::NEWS_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = News::NEWS_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = News::NEWS_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->TitleEn) {
                $model->LinkUrl = \app\components\Utilities::createUrlString($model->TitleEn);
            }
            // var_dump($model->attributes);
            if ($model->save()) {
                $update = 0;
                if ($model->Photo) {
                    $model->Photo = UploadedFile::getInstance($model, 'Photo');
                    $file_name = $model->uploadPhoto(); //uploading the Photo if any
                    if ($file_name) {
                        $model->Photo = $file_name;
                    }
                    $update++;
                }
                if ($model->Attachment) {
                    $model->Attachment = UploadedFile::getInstance($model, 'Attachment');
//                    var_dump($model->Attachment);
//                    exit;
                    $Attachment_name = $model->uploadAttachment(); //uploading the attchment if any
                    if ($Attachment_name) {
                        $model->Attachment = $Attachment_name;
                    }
                    $update++;
                }
                if ($update) {
                    $model->update();
                }
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('//news/create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == News::NEWS_STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        $session = Yii::$app->session;
        if ($session['UNIT_ID']) {
            $model->UnitID = $session['UNIT_ID'];
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->TitleEn = strtolower($model->TitleEn);
            $model->TitleSw = strtolower($model->TitleSw);
            if ($model->TitleEn) {
                $model->LinkUrl = \app\components\Utilities::createUrlString($model->TitleEn);
            }
            if ($model->save()) {
                if (Yii::$app->request->post('save') == 'save') {
                    $model->Status = News::NEWS_STATUS_SAVED;
                    $model->DatePosted = NULL;
                } elseif (Yii::$app->request->post('publish') == 'publish') {
                    $model->Status = News::NEWS_STATUS_PUBLISHED;
                    $model->DatePosted = Date('Y-m-d H:i:s', time());
                }
                if (isset($_FILES['News']['name']['Photo'])) {
                    $model->Photo = UploadedFile::getInstance($model, 'Photo');
                    $file_name = $model->uploadPhoto(); //uploading the Photo if any
                    if ($file_name) {
                        $model->Photo = $file_name;
                    }
                    $model->update();
                }
                if (isset($_FILES['News']['name']['Attachment'])) {
                    $model->Attachment = UploadedFile::getInstance($model, 'Attachment');
                    $Attachment_name = $model->uploadAttachment(); //uploading the attchment if any
                    if ($Attachment_name) {
                        $model->Attachment = $Attachment_name;
                    }
                    $model->update();
                }

                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('//news/update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != News::NEWS_STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['//news/index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = News::findOne($id);
        if ($model->Status == News::NEWS_STATUS_SAVED OR $model->Status == News::NEWS_STATUS_UNPUBLISHED) {
            $model->Status = News::NEWS_STATUS_PUBLISHED;
            $model->DatePosted = Date('Y-m-d H:i:s', time());
            $model->save();
        }
        return $this->redirect(['//news/view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = News::findOne($id);
        if ($model->Status == News::NEWS_STATUS_PUBLISHED) {
            $model->Status = News::NEWS_STATUS_UNPUBLISHED;
            $model->DatePosted = NULL;
            $model->save();
        }
        return $this->redirect(['//news/view', 'id' => $model->Id]);
    }

}
