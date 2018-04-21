<?php

namespace app\controllers;

use Yii;
use app\models\Leadership;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeadershipController implements the CRUD actions for Leadership model.
 */
class LeadershipController extends Controller {

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
                        'matchCallback' => function ($rule, $action) {
                            return ((!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) && (Yii::$app->session->has('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->has('UNIT_ID'))) ? TRUE : FALSE;
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
     * Lists all Leadership models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Leadership::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leadership model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Leadership model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Leadership();
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Leadership::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Leadership::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Leadership::STATUS_PUBLISHED;
            }
            $model->Photo = \yii\web\UploadedFile::getInstance($model, 'Photo');
            if ($model->validate()) {
                if ($model->Photo) {
                    $fileName = trim('LEADER_SHIP_' . $model->FName . '.' . $model->Photo->extension);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Photo->saveAs($filePath)) {
                        $model->Photo = $fileName;
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 150, 200, 99);
                    }
                }
            }
            if ($model->save(FALSE)) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Leadership model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Leadership::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Leadership::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Leadership::STATUS_PUBLISHED;
            }
            $model->Photo = \yii\web\UploadedFile::getInstance($model, 'Photo');
            if ($model->validate()) {
                if ($model->Photo) {
                    $fileName = trim('LEADER_SHIP_' . $model->FName . '.' . $model->Photo->extension);
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;
                    if ($model->Photo->saveAs($filePath)) {
                        $model->Photo = $fileName;
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 150, 200, 99);
                    }
                }
            }
            if ($model->save(FALSE)) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Leadership model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model=$this->findModel($id)->delete();
        if ($model && $model->Status != Leadership::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Leadership model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leadership the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Leadership::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = Leadership::findOne($id);
        if ($model->Status == Leadership::STATUS_SAVED OR $model->Status == Leadership::STATUS_UNPUBLISHED) {
            $model->Status = Leadership::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = Leadership::findOne($id);
        if ($model->Status == Leadership::STATUS_PUBLISHED) {
            $model->Status = Leadership::STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
