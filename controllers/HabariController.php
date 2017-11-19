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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'publish', 'unPublish'],
                'rules' => [
                    [
                        'allow' => true,
                        // 'verbs' => ['post'],
                        // 'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return ((!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) && (Yii::$app->session->has('USER_TYPE_ADMINISTRATOR') OR Yii::$app->session->has('USER_TYPE_CONTENT_MANAGER'))) ? TRUE : FALSE;
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
        $model->TitleEn = trim($model->TitleEn);
        $model->TitleSw = trim($model->TitleSw);
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
                $seoUrl = trim('/news/' . $model->TitleEn);
                if ($model->UnitID) {
                    $unit_details = \app\models\AcademicAdministrativeUnit::getUnitAbbreviationAndTypeByID($model->UnitID);
                    $unit_type = NULL;
                    if ($unit_details && isset($unit_details['abv']) && isset($unit_details['type'])) {
                        switch (strtolower($unit_details['type'])) {
                            case 'administratives':
                                $unit_type = 'units';
                                break;
                            case 'constituent colleges':

                                $unit_type = 'colleges';

                                break;
                            default :
                                $unit_type = strtolower($unit_details['type']);
                                break;
                        }
                        $seoUrl = trim('/'.trim($unit_type) . '/' . trim($unit_details['abv']) . $seoUrl);
                    }
                }
                $model->LinkUrl = \app\components\Utilities::createUrlString($seoUrl);
            }
            $model->Photo = \yii\web\UploadedFile::getInstance($model, 'Photo');
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
            $model->Status = News::NEWS_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = News::NEWS_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = News::NEWS_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->validate()) {
                //uploading the news photo
                if ($model->Photo) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_' . $model->TitleEn . '.' . $model->Photo->extension);
                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT' . $model->UnitID . '_' . $model->TitleEn . '.' . $model->Photo->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Photo->saveAs($filePath)) {
                        $model->Photo = $fileName;
                        //resize the image to a required size
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 1000, 500, 90);
                    }
                }

                //uploading the attachement related to the news
                if ($model->Attachment) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_' . $model->TitleEn . '.' . $model->Attachment->extension);
                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT' . $model->UnitID . '_' . $model->TitleEn . '.' . $model->Attachment->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Attachment->saveAs($filePath)) {
                        $model->Attachment = $fileName;
                    }
                }

                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
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
        $Attachment = $model->Attachment;
        $Photo = $model->Photo;
        if ($model->load(Yii::$app->request->post())) {
            $model->TitleEn = trim($model->TitleEn);
            $model->TitleSw = trim($model->TitleSw);
            if ($model->TitleEn) {
                $seoUrl = trim('/news/' . $model->TitleEn);
                if ($model->UnitID) {
                    $unit_details = \app\models\AcademicAdministrativeUnit::getUnitAbbreviationAndTypeByID($model->UnitID);
                    $unit_type = NULL;
                    if ($unit_details && isset($unit_details['abv']) && isset($unit_details['type'])) {
                        switch (strtolower($unit_details['type'])) {
                            case 'administratives':
                                $unit_type = 'units';
                                break;
                            case 'constituent colleges':

                                $unit_type = 'colleges';

                                break;
                            default :
                                $unit_type = strtolower($unit_details['type']);
                                break;
                        }
                        $seoUrl = trim('/'.trim($unit_type) . '/' . trim($unit_details['abv']) . $seoUrl);
                    }
                }
                $model->LinkUrl = \app\components\Utilities::createUrlString($seoUrl);
            }
            $model->Photo = $Photo;
            $model->Photo = \yii\web\UploadedFile::getInstance($model, 'Photo');
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
            $model->Status = News::NEWS_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = News::NEWS_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = News::NEWS_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->validate()) {
                //uploading the news photo
                if ($model->Photo) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_' . $model->TitleEn . '.' . $model->Photo->extension);
                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT' . $model->UnitID . '_' . $model->TitleEn . '.' . $model->Photo->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Photo->saveAs($filePath)) {
                        $model->Photo = $fileName;
                        //resize the image to a required size
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 1000, 500, 90);
                    }
                }



                //uploading the attachement related to the news
                if ($model->Attachment) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_' . $model->TitleEn . '.' . $model->Attachment->extension);
                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT' . $model->UnitID . '_' . $model->TitleEn . '.' . $model->Attachment->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Attachment->saveAs($filePath)) {
                        $model->Attachment = $fileName;
                    }
                } else {
                    $model->Attachment = $Attachment;
                }

                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
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
        return $this->redirect('index');
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
            $model->save(FALSE);
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = News::findOne($id);
        if ($model->Status == News::NEWS_STATUS_PUBLISHED) {
            $model->Status = News::NEWS_STATUS_UNPUBLISHED;
            $model->DatePosted = NULL;
            $model->save(FALSE);
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
