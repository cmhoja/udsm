<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\Utilities;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller {

    //setting the details layout to backend layout
    public $layout = "/main";

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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new UsersSearch();
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
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Users();
        if (\Yii::$app->params['authType'] != 'ldap') {
            $model->scenario = 'require_user_password';
        }
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            if (empty($model->Password)) {
                $model->Password = $model->UserName;
            }
            if ($model->Password) {
                $model->Password = \app\components\Utilities::setHashedValue($model->Password);
            }
            $model->Status = Users::ACC_STATUS_ACTIVE;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $OldPassword = $model->Password;
        if (empty($OldPassword) && (\Yii::$app->params['authType'] != 'ldap')) {
            $model->scenario = 'require_user_password';
        }
        if ($model->load(Yii::$app->request->post())) {
          
            if (empty($model->Password) && empty($OldPassword)) {
                if ($model->UserName) {
                    $model->Password = \app\components\Utilities::setHashedValue($model->UserName);
                }
            } elseif (!empty($model->Password) && empty($OldPassword)) {
                $model->Password = \app\components\Utilities::setHashedValue($model->Password);
            } elseif (!empty($model->Password) && !empty($OldPassword) && $model->Password != $OldPassword) {
                $model->Password = \app\components\Utilities::setHashedValue($model->Password);
            } else {
                $model->Password = $OldPassword;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->Id]);
            }
        }
        $model->Password = NULL;

        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
