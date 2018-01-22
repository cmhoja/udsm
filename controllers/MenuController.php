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
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view', 'delete', 'addItem', 'editItem', 'deleteItem', 'publish', 'unPublish'],
                'rules' => [
                    [
                        'allow' => true,
                        // 'verbs' => ['post'],
                        // 'roles' => ['@'],
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new MenuSearch();
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
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $menu_items = NULL;
        if ($model) {
            ///getting the parent menus
            $menu_items = \app\models\MenuItem::find()->where(array('MenuID' => $model->Id, 'ParentItemID' => 0))->orderBy('ListOrder ASC, ItemNameEn ASC')->all();
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
            }
            switch ($menu_item_model->UrlType) {
                case \app\models\MenuItem::URL_TYPE_EXTERNAL:
                    $menu_item_model->LinkUrl = trim($menu_item_model->LinkUrl);
                    break;

                default: ///for  all and intetnal links
                    //check if parent ID exists & has college
                    ///check for existance of Unit or
                    $college_abbreviation = NULL;
                    if ($model->UnitID) {
                        $unit_data = \app\models\AcademicAdministrativeUnit::getUnitAbbreviationAndTypeByID($model->UnitID);
                        if (isset($unit_data['type'])) {
                            $college_abbreviation .= trim($unit_data['type']);
                        }
                        if (isset($unit_data['abv'])) {
                            $college_abbreviation .= trim('/' . $unit_data['abv']);
                        }
                    }
                    if ($menu_item_model->LinkUrl == '#' OR $menu_item_model->LinkUrl == '/#' OR $menu_item_model->LinkUrl == '/' OR empty($menu_item_model->LinkUrl) OR is_null($menu_item_model->LinkUrl)) {
                        $menu_item_model->LinkUrl = trim($college_abbreviation . '/#');
                        if ($menu_item_model->ParentItemID) {
                            // $parentUrl = \app\models\MenuItem::getParentUrlbyId($menu_item_model->ParentItemID);
                            $parentUrl = \app\models\MenuItem::getItemDetailsById($menu_item_model->ParentItemID);
                            if ($parentUrl) {
                                $menu_item_model->LinkUrl = $parentUrl->LinkUrl . '/#';

                                if ($parentUrl->LinkUrl == '#' OR $parentUrl->LinkUrl == '/' OR $parentUrl->LinkUrl == '/#') {
                                    $menu_item_model->LinkUrl = $parentUrl->LinkUrl;
                                }
                            }
                        }
                    }
                    break;
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

    public function actionEditItem($id) {
        $menu_item_model = \app\models\MenuItem::findOne($id);
        $old_url = $menu_item_model->LinkUrl;
        if ($menu_item_model) {
            $model = Menu::findOne($menu_item_model->MenuID);
            if ($menu_item_model->load(Yii::$app->request->post())) {
                if (!$menu_item_model->ParentItemID) {
                    $menu_item_model->ParentItemID = 0;
                }
                switch ($menu_item_model->UrlType) {
                    case \app\models\MenuItem::URL_TYPE_EXTERNAL:
                        $menu_item_model->LinkUrl = trim($menu_item_model->LinkUrl);
                        break;

                    default: ///for  all and intetnal links
                        //check if parent ID exists & has college
                        ///check for existance of Unit or
                        $college_abbreviation = NULL;
                        if ($model->UnitID) {
                            $unit_data = \app\models\AcademicAdministrativeUnit::getUnitAbbreviationAndTypeByID($model->UnitID);
                            if (isset($unit_data['type'])) {
                                $college_abbreviation .= $unit_data['type'];
                            }
                            if (isset($unit_data['abv'])) {
                                $college_abbreviation .= '/' . $unit_data['abv'];
                            }
                        }
                        if ($menu_item_model->LinkUrl == '#' OR $menu_item_model->LinkUrl == '/#' OR $menu_item_model->LinkUrl == '/' OR empty($menu_item_model->LinkUrl) OR is_null($menu_item_model->LinkUrl)) {
                            $menu_item_model->LinkUrl = trim($college_abbreviation . '/#');
                            if ($menu_item_model->ParentItemID) {
                                //$parentUrl = \app\models\MenuItem::getParentUrlbyId($menu_item_model->ParentItemID);
                                $parentUrl = \app\models\MenuItem::getItemDetailsById($menu_item_model->ParentItemID);
                                if ($parentUrl) {
                                    $menu_item_model->LinkUrl = $parentUrl->LinkUrl . '/#';
                                    if ($parentUrl->LinkUrl == '#' OR $parentUrl->LinkUrl == '/' OR $parentUrl->LinkUrl == '/#') {
                                        $menu_item_model->LinkUrl = $parentUrl->LinkUrl;
                                    }
                                    if ($parentUrl->UrlType == \app\models\MenuItem::URL_TYPE_EXTERNAL) {
                                        $menu_item_model->LinkUrl = trim($college_abbreviation . '/#');
                                    }
                                }
                            }
                        } else {
                            if ($old_url != $menu_item_model->LinkUrl) {
                                $menu_item_model->LinkUrl = trim($menu_item_model->LinkUrl);
                            }
//                            echo $menu_item_model->LinkUrl;
//                            exit;
                            /*
                              if (strpos($college_abbreviation, $menu_item_model->LinkUrl, 0)) {
                              $menu_item_model->LinkUrl = $menu_item_model->LinkUrl;
                              } else {
                              $menu_item_model->LinkUrl = $college_abbreviation . '/' . $menu_item_model->LinkUrl;
                              } */
                        }
                        break;
                }
                $menu_item_model->Status = \app\models\MenuItem::STATUS_ENABLED;
                if ($menu_item_model->save()) {
                    return $this->redirect(['view', 'id' => $menu_item_model->MenuID]);
                }
            }
            return $this->render('addItem', [
                        'model' => $model, 'menu_item_model' => $menu_item_model
            ]);
        }
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
        //$model->delete();
        if ($model) {
            \app\models\MenuItem::findOne($id)->delete();
        }
        return $this->redirect(['view', 'id' => $MenuID]);
    }

}
