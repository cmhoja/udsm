<?php

namespace app\controllers;

use Yii;
use app\models\Documents;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller {

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
            ], 'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'publish', 'unPublish'],
                'rules' => [
                    [
                        'allow' => true,
                        // 'verbs' => ['post'],
                        // 'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return ((!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) && !Yii::$app->session->has('UNIT_ID') && (Yii::$app->session->has('USER_TYPE_ADMINISTRATOR') OR Yii::$app->session->has('USER_TYPE_CONTENT_MANAGER'))) ? TRUE : FALSE;
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
     * Lists all Documents models.
     * @return mixed
     */
    public function actionIndex() {
        $session = Yii::$app->session;
        $query = Documents::find();
        if ($session->has('UNIT_ID')) {
            $UnitID = $session->get('UNIT_ID');
            $query = Documents::find()->where('UnitID=:UnitID', [':UnitID' => $UnitID]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Documents();
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Documents::DOC_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Documents::DOC_STATUS_SAVED;
                $model->DatePublished = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Documents::DOC_STATUS_PUBLISHED;
                $model->DatePublished = Date('Y-m-d H:i:s', time());
            }
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
            if ($model->validate()) {
                if ($model->Attachment) {
                    $fileName = trim($model->Attachment->name);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Attachment->saveAs($filePath)) {
                        $model->Attachment = $fileName;
                    }
                }
                if ($model->save(FALSE)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Documents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Documents::DOC_STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Documents::DOC_STATUS_SAVED;
                $model->DatePublished = NULL;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Documents::DOC_STATUS_PUBLISHED;
                $model->DatePublished = Date('Y-m-d H:i:s', time());
            }
            $model->Attachment = \yii\web\UploadedFile::getInstance($model, 'Attachment');
            if ($model->validate()) {
                if ($model->Attachment) {
                    $fileName = trim($model->Attachment->name);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Attachment->saveAs($filePath)) {
                        $model->Attachment = $fileName;
                    }
                }

                if ($model->save(FALSE)) {
                    return $this->redirect(['view', 'id' => $model->Id]);
                }
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Documents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Documents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
