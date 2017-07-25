<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\MenuItem;
use app\models\Menu;
use app\components\SiteRegions;
use app\models\CustomBlocks;

class StudyController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'index' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {

        //getting user current langauage;
        $page_side_menus = $page_content = $custom_blocks = NULL;
        $lang = Yii::$app->language;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());

        $page_content = \app\models\BasicPage::getActivePageDetailsByUrl($url);

        if ($page_content) {
            $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $page_content->UnitID, $url);
            $custom_page_block_regions = SiteRegions::getCustomPageTemplateRegions();
            if ($custom_page_block_regions) {
                foreach ($custom_page_block_regions as $RegionID => $RegionName) {
                    $CustomBlock = CustomBlocks::getActiveBlocksByRegionId($RegionID, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url);
                    if ($CustomBlock) {
                        $custom_blocks[$RegionId] = $CustomBlock;
                    }
                }
            }
        }
        $content = array('page_content' => $page_content, 'side_menus' => $page_side_menus, 'custom_blocks' => $custom_blocks);
        return $this->render('//site/pages/index', $content);
    }

    /**
     * Displays forbidden page.
     *
     * @return string
     */
    public function actionForbidden() {
        return $this->render('//site/forbidden');
    }

    public function actionProgrammes() {

        $url = \app\components\Utilities::getPageUrl();
        $url = explode('/', $url);
        $programmeType = $Keyword = $UnitID = $FieldOfStudy = NULL;
        if (isset($url[0]) && isset($url[1]) && isset($url[2])) {
            switch ($url[1]) {
                case \app\models\Programmes::PROGRAME_TYPE_UNDERGRADUATE:
                    $programmeType = \app\models\Programmes::PROGRAME_TYPE_UNDERGRADUATE;
                    break;

                case \app\models\Programmes::PROGRAME_TYPE_POSTUNDERGRADUATE:
                    $programmeType = \app\models\Programmes::PROGRAME_TYPE_POSTUNDERGRADUATE;
                    break;

                case \app\models\Programmes::PROGRAME_TYPE_NON_DEGREE:
                    $programmeType = \app\models\Programmes::PROGRAME_TYPE_NON_DEGREE;
                    break;

                default:
                    break;
            }
        } elseif (isset($url[0]) && isset($url[1]) && !isset($url[2])) {
            $programmeType = NULL;
        }

        if (Yii::$app->request->post()) {
            $Keyword = Yii::$app->request->post('Keyword');
            $UnitID = Yii::$app->request->post('UnitId');
            $FieldOfStudy = Yii::$app->request->post('FieldOfStudy');
            //echo $Keyword . '=asdsa';
            // exit;
        }

        $language = Yii::$app->language;
        $page_content = \app\models\Programmes::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $programmeType, $FieldOfStudy, $language);

        $content = array('page_content' => $page_content);
        return $this->render('//site/pages/programmes', $content);
    }

}
