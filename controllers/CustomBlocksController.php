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
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = CustomBlocks::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = CustomBlocks::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = CustomBlocks::STATUS_PUBLISHED;
            }
            switch ($model->BlockType) {
                case CustomBlocks::BLOCK_TYPE_HOME_PAGE:
                    $model->BlockPlacementAreaRegion = $model->BlockPlacementAreaRegion1;
                    break;
                case CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE:
                    $model->BlockPlacementAreaRegion = $model->BlockPlacementAreaRegion2;
                    break;
            }

            if ($model->save()) {
                $update = 0;
                if ($model->BlockIconPicture) {
                    $model->BlockIconPicture = UploadedFile::getInstance($model, 'BlockIconPicture');
                    $file_name = $model->uploadPhoto(); //uploading the Photo if any
                    if ($file_name) {
                        $model->BlockIconPicture = $file_name;
                        $update++;
                    }
                }
                if ($update) {
                    $model->update();
                }
                return $this->redirect(['view', 'id' => $model->Id]);
            }
            var_dump($model->errors);
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
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model && $model->Status == CustomBlocks::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        switch ($model->BlockType) {
            case CustomBlocks::BLOCK_TYPE_HOME_PAGE:
                $model->BlockPlacementAreaRegion1 = $model->BlockPlacementAreaRegion;

                break;

            case CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE:
                $model->BlockPlacementAreaRegion2 = $model->BlockPlacementAreaRegion;

                break;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->Status = CustomBlocks::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = CustomBlocks::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = CustomBlocks::STATUS_PUBLISHED;
            }
            switch ($model->BlockType) {
                case CustomBlocks::BLOCK_TYPE_HOME_PAGE:
                    $model->BlockPlacementAreaRegion = $model->BlockPlacementAreaRegion1;
                    break;

                case CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE:
                    $model->BlockPlacementAreaRegion = $model->BlockPlacementAreaRegion2;
                    break;
            }


            if ($model->save()) {
                $update = 0;
                if ($model->BlockIconPicture) {
                    $model->BlockIconPicture = UploadedFile::getInstance($model, 'BlockIconPicture');
                    $file_name = $model->uploadPhoto(); //uploading the Photo if any
                    if ($file_name) {
                        $model->BlockIconPicture = $file_name;
                        $update++;
                    }
                }
                if ($update) {
                    $model->update();
                }
                return $this->redirect(['view', 'id' => $model->Id]);
            }
            var_dump($model->errors);
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
        $model = $this->findModel($id)->delete();
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
