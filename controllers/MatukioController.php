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
class MatukioController extends Controller {

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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EventsSearch();
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $searchModel->UnitID = $session->get('UNIT_ID');
        }
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('//events/index', [
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
        return $this->render('//events/view', [
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
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
        }

        if ($model->load(Yii::$app->request->post())) {
            var_dump(Yii::$app->request->post('Events'));
            $model->EventTitleEn = strtolower($model->EventTitleEn);
            $model->EventTitleSw = strtolower($model->EventTitleSw);
            //  $model->EventTitleSw = strtolower($model->EventTitleSw);
            if ($model->StartDate) {
                $model->StartDate = Date('Y-m-d', strtotime($model->StartDate));
            }
            if ($model->EndDate) {
                $model->EndDate = Date('Y-m-d', strtotime($model->EndDate));
            }
         if ($model->EventTitleEn) {
                $seoUrl = '/events/' . $model->EventTitleEn;
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
                        $seoUrl = trim(trim('/'.$unit_type) . '/' . trim($unit_details['abv']). $seoUrl);
                    }
                }
                $model->EventUrl = \app\components\Utilities::createUrlString($seoUrl);
            }
            $model->Status = Events::EVENT_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Events::EVENT_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Events::EVENT_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }

            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
            if ($model->validate()) {
                if ($model->Attachment) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('MAIN_EVENT_' . $model->EventTitleEn . '.' . $model->Attachment->extension);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;

                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT_EVENT_' . $model->EventTitleEn . '.' . $model->Attachment->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_units_site'] . '/' . $fileName;

                    if ($model->Attachment->saveAs($filePath)) {
                        $model->Attachment = $fileName;
                        //resize the image to a required size
                        //  \app\components\Utilities::ResizeImage($filePath, $filePath, 273, 200, 90);
                    }
                }
                if ($model->save(FALSE)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
            }
        }
        return $this->render('//events/create', [
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
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
        }
        $Attachment = $model->Attachment;
        if ($model->load(Yii::$app->request->post())) {
            $model->EventTitleEn = strtolower($model->EventTitleEn);
            $model->EventTitleSw = strtolower($model->EventTitleSw);
            if ($model->StartDate) {
                $model->StartDate = Date('Y-m-d', strtotime($model->StartDate));
            }
            if ($model->EndDate) {
                $model->EndDate = Date('Y-m-d', strtotime($model->EndDate));
            }
            if ($model->EventTitleEn) {
                $seoUrl = '/events/' . $model->EventTitleEn;
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
                        $seoUrl = trim(trim('/'.$unit_type) . '/' . trim($unit_details['abv']). $seoUrl);
                    }
                }
                $model->EventUrl = \app\components\Utilities::createUrlString($seoUrl);
            }

            $model->Status = Events::EVENT_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Events::EVENT_STATUS_SAVED;
                $model->DatePosted = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Events::EVENT_STATUS_PUBLISHED;
                $model->DatePosted = Date('Y-m-d H:i:s', time());
            }
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
            if ($model->validate()) {
                if ($model->Attachment) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('MAIN_EVENT_' . $model->BlockTitleEn . '.' . $model->Attachment->extension);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;

                    if ($model->UnitID > 0) {
                        $fileName = trim('UNIT_EVENT_' . $model->BlockTitleEn . '.' . $model->Attachment->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_units_site'] . '/' . $fileName;

                    if ($model->Attachment->saveAs($filePath)) {
                        $model->Attachment = $fileName;
                        //resize the image to a required size
                        //  \app\components\Utilities::ResizeImage($filePath, $filePath, 273, 200, 90);
                    } else {
                        $model->Attachment = $Attachment;
                    }
                } else {
                    $model->Attachment = $Attachment;
                }
                if ($model->save(FALSE)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
            }
        }
        return $this->render('//events/update', [
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
