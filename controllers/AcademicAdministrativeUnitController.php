<?php

namespace app\controllers;

use Yii;
use app\models\AcademicAdministrativeUnit;
use app\models\AcademicAdministrativeUnitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AcademicAdministrativeUnitController implements the CRUD actions for AcademicAdministrativeUnit model.
 */
class AcademicAdministrativeUnitController extends Controller {

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
     * Lists all AcademicAdministrativeUnit models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AcademicAdministrativeUnitSearch();
        $session = Yii::$app->session;
        if ($session['UNIT_ID']) {
            $searchModel->ParentUnitId = $session['UNIT_ID'];
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AcademicAdministrativeUnit model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AcademicAdministrativeUnit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new AcademicAdministrativeUnit();

        if ($model->load(Yii::$app->request->post())) {
            if (is_null($model->ParentUnitId) OR empty($model->ParentUnitId)) {
                $model->ParentUnitId = 0;
            }
            $model->UnitAbreviationCode = strtolower($model->UnitAbreviationCode);
            if ($model->TypeContentManagement == AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL) {
                $model->scenario = 'require_unit_code';
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing AcademicAdministrativeUnit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if (is_null($model->ParentUnitId) OR empty($model->ParentUnitId)) {
                $model->ParentUnitId = 0;
            }
            $model->UnitAbreviationCode = strtolower($model->UnitAbreviationCode);
            if ($model->TypeContentManagement == AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL) {
                $model->scenario = 'require_unit_code';
            }
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AcademicAdministrativeUnit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AcademicAdministrativeUnit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AcademicAdministrativeUnit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AcademicAdministrativeUnit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
