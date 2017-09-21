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
                        'actions' => ['index', 'programmes'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
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
        if (Yii::$app->request->post('Search')) {
            $Keyword = Yii::$app->request->post('ProgrameName');
            $UnitID = Yii::$app->request->post('UnitId');
            $FieldOfStudy = Yii::$app->request->post('FieldStudy');
            $programmeType = Yii::$app->request->post('PTYpe');
        } else {
            $programmeType = $Keyword = $UnitID = $FieldOfStudy = NULL;
            if (isset($url[0]) && isset($url[1]) && isset($url[2])) {
                $programType = NULL;
                if (!empty($url[2]) && $url[2] == 'programmes' && isset($url[3])) {
                    $programType = $url[3];
                } else if (isset($url[3]) && !empty($url[3]) && $url[3] == 'programmes') {
                    $programType = $url[2];
                }
                switch ($programType) {
                    case 'undergraduate':
                        $programmeType = \app\models\Programmes::PROGRAME_TYPE_UNDERGRADUATE;
                        break;

                    case 'undergraduate-program':
                        $programmeType = \app\models\Programmes::PROGRAME_TYPE_UNDERGRADUATE;
                        break;

                    case 'postgraduate':
                        $programmeType = \app\models\Programmes::PROGRAME_TYPE_POSTUNDERGRADUATE;
                        break;

                    case 'postgraduate-program':
                        $programmeType = \app\models\Programmes::PROGRAME_TYPE_POSTUNDERGRADUATE;
                        break;

                    case 'non-degree':
                        $programmeType = \app\models\Programmes::PROGRAME_TYPE_NON_DEGREE;
                        break;

                    case 'non-degree-program':
                        $programmeType = \app\models\Programmes::PROGRAME_TYPE_NON_DEGREE;
                        break;

                    default:
                        $programmeType = NULL;
                        break;
                }
            }
        }
        $language = Yii::$app->language;
        $page_content = \app\models\Programmes::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $programmeType, $FieldOfStudy, $language);

        $content = array('page_content' => $page_content);
        return $this->render('//site/pages/programmes', $content);
    }

    public function actionCatalogue() {
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url = explode('/', $url);
        $count = count($url);
        $programmeType = $Keyword = $UnitID = $FieldOfStudy = NULL;

        if (isset($url[$count - 2]) && $url[$count - 2] == 'catalogue') {
            $Keyword = $url[$count - 1];
        }

        $language = Yii::$app->language;
        $page_content = \app\models\Programmes::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $programmeType, $FieldOfStudy, $language);

        $content = array('page_content' => $page_content);
        return $this->render('//site/pages/programmes_catalogue', $content);
    }

    public function actionProgramme() {
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url = explode('/', $url);
        $page_content = NULL;
        if (is_array($url) && count($url) >= 4) {
            $program_name = $url[3];
            $condition = array('ProgrammeUrl' => $program_name);

            $page_content = \app\models\Programmes::find()->where($condition)->one();
        }
        $content = array('page_content' => $page_content);
        return $this->render('//site/pages/programme_details', $content);
    }

}
