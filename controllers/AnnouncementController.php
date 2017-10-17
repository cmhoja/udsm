<?php

namespace app\controllers;

use Yii;
use app\models\Announcement;
use app\models\AnnouncementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnnouncementController implements the CRUD actions for Announcement model.
 */
class AnnouncementController extends Controller {

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
     * Lists all Announcement models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AnnouncementSearch();
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
     * Displays a single Announcement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Announcement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Announcement();
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->TitleEn = strtolower($model->TitleEn);
            $model->TitleSw = strtolower($model->TitleSw);
            $model->Status = Announcement::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Announcement::STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Announcement::STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->TitleEn) {
                $model->LinkUrl = \app\components\Utilities::createUrlString($model->TitleEn);
            }

            //uploading the attachement related to the news
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
//            var_dump($model->attributes);
//            exit;
            if ($model->validate()) {
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

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Announcement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == Announcement::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->TitleEn = strtolower($model->TitleEn);
            $model->TitleSw = strtolower($model->TitleSw);
            $model->Status = Announcement::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Announcement::STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Announcement::STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            if ($model->TitleEn) {
                $model->LinkUrl = \app\components\Utilities::createUrlString($model->TitleEn);
            }
            //uploading the attachement related to the news
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
//            var_dump($model->attributes);
//            exit;
            if ($model->validate()) {
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
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Announcement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != Announcement::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Announcement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Announcement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Announcement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = Announcement::findOne($id);
        if ($model->Status == Announcement::STATUS_SAVED OR $model->Status == Announcement::STATUS_UNPUBLISHED) {
            $model->Status = Announcement::STATUS_PUBLISHED;
            $model->DatePosted = Date('Y-m-d H:i:s', time());
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = Announcement::findOne($id);
        if ($model->Status == Announcement::STATUS_PUBLISHED) {
            $model->Status = Announcement::STATUS_UNPUBLISHED;
            $model->DatePosted = NULL;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
