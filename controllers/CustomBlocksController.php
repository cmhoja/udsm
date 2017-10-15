<?php

namespace app\controllers;

use Yii;
use app\models\CustomBlocks;
use app\models\CustomBlocksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomBlocksController implements the CRUD actions for CustomBlocks model.
 */
class CustomBlocksController extends Controller {

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
                            return ((!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) && Yii::$app->session->has('USER_TYPE_ADMINISTRATOR')) ? TRUE : FALSE;
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
     * Lists all CustomBlocks models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CustomBlocksSearch();
        if (Yii::$app->session->has('UNIT_ID')) {
            $searchModel->BlockUnitID = Yii::$app->session->get('UNIT_ID');
        }
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomBlocks model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CustomBlocks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CustomBlocks();
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->BlockUnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = CustomBlocks::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = CustomBlocks::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = CustomBlocks::STATUS_PUBLISHED;
            }
            $model->Upload = \yii\web\UploadedFile::getInstance($model, 'Upload');
            if ($model->validate()) {
                if ($model->Upload) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_BLOCK_' . $model->BlockTitleEn . '.' . $model->Upload->extension);
                    if ($model->BlockUnitID > 0) {
                        $fileName = trim('UNIT_BLOCK_' . $model->BlockTitleEn . '.' . $model->Upload->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;

                    if ($model->Upload->saveAs($filePath)) {
                        $model->BlockIconPicture = $fileName;
                        //resize the image to a required size
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 270, 270, 90);
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
     * Updates an existing CustomBlocks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->BlockUnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model && $model->Status == CustomBlocks::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = CustomBlocks::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = CustomBlocks::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = CustomBlocks::STATUS_PUBLISHED;
            }

            $model->Upload = \yii\web\UploadedFile::getInstance($model, 'Upload');
            if ($model->validate()) {
                if ($model->Upload) {
                    //$fileName = $model->Upload->baseName . '.' . $model->Upload->extension;
                    $fileName = trim('UDSM_BLOCK_' . $model->BlockTitleEn . '.' . $model->Upload->extension);
                    if ($model->BlockUnitID > 0) {
                        $fileName = trim('UNIT_BLOCK_' . $model->BlockTitleEn . '.' . $model->Upload->extension);
                    }
                    $filePath = Yii::$app->basePath . Yii::$app->params['file_upload_main_site'] . '/' . $fileName;

                    if ($model->Upload->saveAs($filePath)) {
                        $model->BlockIconPicture = $fileName;
                        //resize the image to a required size
                        \app\components\Utilities::ResizeImage($filePath, $filePath, 270, 270, 90);
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
     * Deletes an existing CustomBlocks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != CustomBlocks::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the CustomBlocks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomBlocks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CustomBlocks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = CustomBlocks::findOne($id);
        if ($model->Status == CustomBlocks::STATUS_SAVED OR $model->Status == CustomBlocks::STATUS_UNPUBLISHED) {
            $model->Status = CustomBlocks::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = CustomBlocks::findOne($id);
        if ($model->Status == CustomBlocks::STATUS_PUBLISHED) {
            $model->Status = CustomBlocks::STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

}
