<?php

namespace app\controllers;

use Yii;
use app\models\Menu;
use app\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller {

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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $menu_items = NULL;
        if ($model) {
            ///getting the parent menus
            $menu_items = \app\models\MenuItem::find()->where(array('MenuID' => $model->Id, 'ParentItemID' => 0))->orderBy('ListOrder ASC')->all();
        }
        return $this->render('view', [
                    'model' => $model, 'menu_items' => $menu_items
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Menu();
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->Status = Menu::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Menu::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Menu::STATUS_PUBLISHED;
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
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status == Menu::STATUS_PUBLISHED) {
            $this->redirect(array('index'));
        }
        if (Yii::$app->session->get('UNIT_ID')) {
            $model->UnitID = Yii::$app->session->get('UNIT_ID');
        }
        if ($model->load(Yii::$app->request->post())) {

            $model->Status = Menu::STATUS_SAVED;
            if (Yii::$app->request->post('save') == 'save') {
                $model->Status = Menu::STATUS_SAVED;
            } elseif (Yii::$app->request->post('publish') == 'publish') {
                $model->Status = Menu::STATUS_PUBLISHED;
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
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        if ($model && $model->Status != Menu::STATUS_PUBLISHED) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAddItem($id) {
        $model = Menu::findOne($id);
        $menu_item_model = new \app\models\MenuItem;
        $menu_item_model->MenuID = $model->Id;
        if ($menu_item_model->load(Yii::$app->request->post())) {
            if (!$menu_item_model->ParentItemID) {
                $menu_item_model->ParentItemID = 0;
            } else {
                $parentUrl = \app\models\MenuItem::getParentUrlbyId($menu_item_model->ParentItemID);
                if ($parentUrl) {
                    $menu_item_model->LinkUrl = $parentUrl . '/' . $menu_item_model->LinkUrl;
                }
            }
            $menu_item_model->Status = \app\models\MenuItem::STATUS_ENABLED;
            if ($menu_item_model->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }
        return $this->render('addItem', [
                    'model' => $model, 'menu_item_model' => $menu_item_model
        ]);
    }

    function actionPublish($id) {
        $model = \app\models\Menu::findOne($id);
        if ($model->Status == \app\models\Menu::STATUS_SAVED OR $model->Status == \app\models\Menu::STATUS_UNPUBLISHED) {
            $model->Status = \app\models\Menu::STATUS_PUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionUnpublish($id) {
        $model = \app\models\Menu::findOne($id);
        if ($model->Status == \app\models\Menu::STATUS_PUBLISHED) {
            $model->Status = \app\models\Menu::STATUS_UNPUBLISHED;
            $model->save();
        }
        return $this->redirect(['view', 'id' => $model->Id]);
    }

    function actionDeleteItem($id) {
        $model = \app\models\MenuItem::findOne($id);
        $MenuID = $model->MenuID;
        //if ($model && $model->Status != \app\models\MenuItem::STATUS_ENABLED) {
        $model->delete();
        //}
        return $this->redirect(['view', 'id' => $MenuID]);
    }

}
