<?php

namespace app\controllers;

use Yii;
use app\models\BasicPage;
use app\models\BasicPageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BasicPageController implements the CRUD actions for BasicPage model.
 */
class BasicPageController extends Controller {

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
     * Lists all BasicPage models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new BasicPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BasicPage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BasicPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new BasicPage();
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = BasicPage::STATUS_SAVED;
            //setting section Url
            $sectionUrl = trim($model->SectionLink);
           if (!empty($sectionUrl)) {
                $sectionUrl = trim($sectionUrl . '/');
            }
            $model->PageSeoUrl = trim($model->PageSeoUrl);
             if ($model->PageTitleEn && empty($model->PageSeoUrl)) {
                $model->PageSeoUrl = trim($sectionUrl . \app\components\Utilities::createUrlString($model->PageTitleEn));
            }
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = BasicPage::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = BasicPage::STATUS_PUBLISHED;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->PageId]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing BasicPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == BasicPage::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = BasicPage::STATUS_SAVED;
           $sectionUrl = trim($model->SectionLink);
            if (!empty($sectionUrl)) {
                $sectionUrl = $sectionUrl . '/';
            }
            $model->PageSeoUrl = trim($model->PageSeoUrl);
             if ($model->PageTitleEn && empty($model->PageSeoUrl)) {
                $model->PageSeoUrl = trim($sectionUrl . \app\components\Utilities::createUrlString($model->PageTitleEn));
            }
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = BasicPage::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = BasicPage::STATUS_PUBLISHED;
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->PageId]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BasicPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != BasicPage::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the BasicPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BasicPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = BasicPage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function actionPublish($id) {
        $model = BasicPage::findOne($id);
        if ($model->Status == BasicPage::STATUS_SAVED OR $model->Status == BasicPage::STATUS_UNPUBLISHED) {
            $model->Status = BasicPage::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->PageId]);
    }

    function actionUnpublish($id) {
        $model = BasicPage::findOne($id);
        if ($model->Status == BasicPage::STATUS_PUBLISHED) {
            $model->Status = BasicPage::STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->PageId]);
    }

}
