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
     * Lists all StaffList models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new StaffListSearch();
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
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = StaffList::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = StaffList::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = StaffList::STATUS_PUBLISHED;
            }
            $model->Photo = \yii\web\UploadedFile::getInstance($model, 'Photo');
            if ($model->validate()) {
                if ($model->Photo) {
                    $photoName = trim('STAFF_PHOTO' . $model->FName . '_' . $model->LName . '.' . $model->Photo->extension);
                    if ($model->UnitID > 0) {
                        $photoName = trim('UNIT_STAFF_PHOTO_' . $model->FName . '_' . $model->LName . '.' . $model->Photo->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $photoName;
                    if ($model->Photo->saveAs($filePath)) {
                        $model->Photo = $photoName;
                    }
                }
                if ($model->save(FALSE)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Updates an existing StaffList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $session = Yii::$app->session;
        if ($session->has('UNIT_ID')) {
            $model->UnitID = $session->get('UNIT_ID');
        }
        if ($model && $model->Status == StaffList::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = StaffList::STATUS_SAVED;
            if (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = StaffList::STATUS_PUBLISHED;
            }
            $model->Photo = \yii\web\UploadedFile::getInstance($model, 'Photo');
            if ($model->validate()) {
                if ($model->Photo) {
                    $photoName = trim('STAFF_PHOTO' . $model->FName . '_' . $model->LName . '.' . $model->Photo->extension);
                    if ($model->UnitID > 0) {
                        $photoName = trim('UNIT_STAFF_PHOTO_' . $model->FName . '_' . $model->LName . '.' . $model->Photo->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $photoName;
                    if ($model->Photo->saveAs($filePath)) {
                        $model->Photo = $photoName;
                    }
                }
                if ($model->save(FALSE)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
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
