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

class ResearchController extends Controller {

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
        return $this->render('//site/pages/research', $content);
    }

    /**
     * Displays forbidden page.
     *
     * @return string
     */
    public function actionForbidden() {
        return $this->render('//site/forbidden');
    }

    public function actionProjects() {
        $lang = Yii::$app->language;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        //getting project url
        $project_url = explode('/', $url);
        if (count($project_url) == 4 && $project_url[3] != '/') {
            $project_url = $project_url[3]; ////project url_name
            $page_content = \app\models\ResearchProjects::getProjectsDetailsByLinkUrl($project_url);
            if ($page_content) {
                $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, NULL, $url);
            }
            $content = array('page_content' => $page_content, 'side_menus' => $page_side_menus);

            return $this->render('//site/pages/research_project_details', $content);
        } else {
            $page_content = \app\models\ResearchProjects::getProjectsByUnitID();
            if ($page_content) {
                $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, NULL, $url);
            }
            $content = array('page_content' => $page_content, 'side_menus' => $page_side_menus);

            return $this->render('//site/pages/research_project', $content);
        }
    }

    public function actionDocuments() {
        $page_side_menus = $page_content = NULL;
        $lang = Yii::$app->language;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_paterrn = explode('/', $url);

        if (count($url_paterrn) > 2) {
            if (isset($url_paterrn[count($url_paterrn) - 1]) && !empty($url_paterrn[count($url_paterrn) - 1]) OR ! is_null($url_paterrn[count($url_paterrn) - 1])) {
                $url_item = $url_paterrn[count($url_paterrn) - 1];
            } elseif (isset($url_paterrn[count($url_paterrn) - 2]) && !empty($url_paterrn[count($url_paterrn) - 2]) OR ! is_null($url_paterrn[count($url_paterrn) - 2])) {
                $url_item = $url_paterrn[count($url_paterrn) - 2];
            }
            switch ($url_item) {
                case 'policies':
                    $doc_type = \app\models\Documents::DOC_TYPE_POLICY_GUIDELINE;
                    break;

                case 'guidelines':
                    $doc_type = \app\models\Documents::DOC_TYPE_POLICY_GUIDELINE;
                    break;

                case 'books':
                    $doc_type = \app\models\Documents::DOC_TYPE_PUBLICATION_BOOKS;
                    break;

                case 'journals':
                    $doc_type = \app\models\Documents::DOC_TYPE_PUBLICATION_JOURNALS;
                    break;
                default :
                    $doc_type = NULL;
                    break;
            }
            $page_content = \app\models\Documents::getActiveDocumentsByTypeAndUnit($doc_type, NULL, \app\models\Documents::DOC_STATUS_PUBLISHED);
        }
        if ($page_content) {
            $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, NULL, $url);
        }
        $content = array('page_content' => $page_content, 'side_menus' => $page_side_menus);
        return $this->render('//site/pages/research_documents', $content);
    }

    public function actionPublications() {
        $page_side_menus = $page_content = NULL;
        $lang = Yii::$app->language;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_paterrn = explode('/', $url);

        if (count($url_paterrn) > 2) {
            if (isset($url_paterrn[count($url_paterrn) - 1]) && !empty($url_paterrn[count($url_paterrn) - 1]) OR ! is_null($url_paterrn[count($url_paterrn) - 1])) {
                $url_item = $url_paterrn[count($url_paterrn) - 1];
            } elseif (isset($url_paterrn[count($url_paterrn) - 2]) && !empty($url_paterrn[count($url_paterrn) - 2]) OR ! is_null($url_paterrn[count($url_paterrn) - 2])) {
                $url_item = $url_paterrn[count($url_paterrn) - 2];
            }
            switch ($url_item) {
                case 'policies':
                    $doc_type = \app\models\Documents::DOC_TYPE_POLICY_GUIDELINE;
                    break;

                case 'guidelines':
                    $doc_type = \app\models\Documents::DOC_TYPE_POLICY_GUIDELINE;
                    break;

                case 'books':
                    $doc_type = \app\models\Documents::DOC_TYPE_PUBLICATION_BOOKS;
                    break;

                case 'journals':
                    $doc_type = \app\models\Documents::DOC_TYPE_PUBLICATION_JOURNALS;
                    break;
                default :
                    $doc_type = NULL;
                    break;
            }
            $page_content = \app\models\Documents::getActiveDocumentsByTypeAndUnit($doc_type, NULL, \app\models\Documents::DOC_STATUS_PUBLISHED);
        }
        if ($page_content) {
            $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, NULL, $url);
        }
        $content = array('page_content' => $page_content, 'side_menus' => $page_side_menus);
        return $this->render('//site/pages/publication_documents', $content);
    }

}
