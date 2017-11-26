<?php

namespace app\controllers;

/**
 * Description of CollegeController
 *
 * @author charles
 */
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\MenuItem;
use app\models\Menu;
use app\components\SiteRegions;
use app\models\CustomBlocks;
use app\models\Users;
use app\models\Events;
use app\models\News;
use app\models\Announcement;
use app\models\SlideShows;

class CollegeController extends Controller {

    public $param;

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
                        'actions' => ['index', 'programs', 'researchs', 'contacts', 'page', 'news', 'announcements', 'events'],
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

    public function init() {
        $this->layout = 'college/main';
        ///setting unit details
        Yii::$app->view->params['unit_name'] = Yii::$app->view->params['unit_id'] = NULL;
        Yii::$app->view->params['unit_logo'] = NULL;
        Yii::$app->view->params['unit_abbreviation_code'] = NULL;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            $unit_abbreviation = trim($url_sections[2]);
            $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
            if ($Academic_unit_details) {
                Yii::$app->view->params['unit_name'] = $Academic_unit_details->UnitNameEn;
                if (Yii::$app->language == 'sw') {
                    Yii::$app->view->params['unit_name'] = $Academic_unit_details->UnitNameSw;
                }
                Yii::$app->view->params['unit_id'] = $Academic_unit_details->Id;
                Yii::$app->view->params['unit_logo'] = $Academic_unit_details->Logo;
                Yii::$app->view->params['unit_abbreviation_code'] = $Academic_unit_details->UnitAbreviationCode;
            }
        }
        parent::init();
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());

        $url_sections = explode('/', $url);

        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ////getting the landing page por a given college 
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details) {
                    $unit_codes = \app\models\AcademicAdministrativeUnit::getUnitAbbreviationAndTypeByID($Academic_unit_details->Id);

                    if ($unit_codes && isset($unit_codes['abv']) && isset($unit_codes['type']) && ($url == trim('/' . $unit_codes['type'] . '/' . $unit_codes['abv'] . '/') OR $url == trim('/' . $unit_codes['type'] . '/' . $unit_codes['abv']))) {
                        $content['home_content_slideshow'] = SlideShows::getActiveLastestSlideShowsByUnitID($Academic_unit_details->Id, 10);
                        //$content['home_content_slideshow_right_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT, $Academic_unit_details->Id, 0);
                        $content['home_content_slideshow_right_menus'] = array();
                        $home_content_slideshow_right_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT, $Academic_unit_details->Id, 0);
                        if ($home_content_slideshow_right_menus) {
                            foreach ($home_content_slideshow_right_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_slideshow_right_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                        $content['home_content_slideshow_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                        //getting data for the home page top column 1,2 & 3
                        $content['home_content_top_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                        $content['home_content_top_left_menus'] = array();
                        $home_content_top_left_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT, $Academic_unit_details->Id, 0);
                        if ($home_content_top_left_menus) {
                            foreach ($home_content_top_left_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_top_left_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                        ///fixed block for announcements
                        $content['home_content_top_middle_announcements'] = Announcement::getLatestAnnouncementsByStatusAndUnit(Announcement::STATUS_PUBLISHED, $Academic_unit_details->Id, 5);
                        ///content top column 3
                        $content['home_content_top_right_menus'] = array();
                        $home_content_top_right_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT, $Academic_unit_details->Id, 0);
                        if ($home_content_top_right_menus) {
                            foreach ($home_content_top_right_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_top_right_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                        $content['home_content_top_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);

                        //////contents for the home page news( or content middle left) and propotion area ( or content middle right)
                        ///fixed news block
                        $content['home_content_middle_left_news'] = News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 4);
                        //news area right column block and menus
                        $content['home_content_middle_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                        $content['home_content_middle_right_menus'] = array();
                        $home_content_middle_right_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT, $Academic_unit_details->Id, 0);
                        if ($home_content_middle_right_menus) {
                            foreach ($home_content_middle_right_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_middle_right_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                        ////contents for events area of the home page
                        //fixed block for events only
                        $content['home_content_events'] = Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, $Academic_unit_details->Id, 6);

                        ////getting content for the content bottom area
                        ///bottom column 1
                        $content['home_content_bottom_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                        //$content['home_content_bottom_column1_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1, $Academic_unit_details->Id, 0);
                        $content['home_content_bottom_column1_menus'] = array();
                        $home_content_bottom_column1_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1, $Academic_unit_details->Id, 0);
                        if ($home_content_bottom_column1_menus) {
                            foreach ($home_content_bottom_column1_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_bottom_column1_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                        //bottom column 2
                        $content['home_content_bottom_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                        //$content['home_content_bottom_column2_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2, $Academic_unit_details->Id, 0);
                        $content['home_content_bottom_column2_menus'] = array();
                        $home_content_bottom_column2_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2, $Academic_unit_details->Id, 0);
                        if ($home_content_bottom_column2_menus) {
                            foreach ($home_content_bottom_column2_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_bottom_column2_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                        //bottom column 3
                        $content['home_content_bottom_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                        //$content['home_content_bottom_column3_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3, $Academic_unit_details->Id, 0);
                        $content['home_content_bottom_column3_menus'] = array();
                        $home_content_bottom_column3_menus = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3, $Academic_unit_details->Id, 0);
                        if ($home_content_bottom_column3_menus) {
                            foreach ($home_content_bottom_column3_menus as $menu_group) {
                                $menu_items = MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, MenuItem::STATUS_ENABLED);
                                $content['home_content_bottom_column3_menus'][$menu_group->Id] = array('MenuCSSClass' => $menu_group->MenuCSSClass, 'DisplayNameEn' => $menu_group->DisplayNameEn, 'DisplayNameSw' => $menu_group->DisplayNameSw,
                                    'MenuItems' => $menu_items);
                            }
                        }
                    } else {
                        ///LOADING THE CUSTOM PAGE HERE

                        $content['page_content'] = \app\components\Utilities::getPageContentByUrl($url);
                        if ($content['page_content']) {
                            //side menu area
                            $content['side_menus'] = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                            $content['side_menus_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            //getting data for the page top column 1,2 & 3
                            $content['page_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            $content['page_content_top_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            $content['page_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            ////getting content for the content top left/right area
                            $content['page_content_top_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            $content['page_content_top_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            //contents for bottom middle area of the page
                            $content['page_content_middle_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            ////getting content for the content bottom area
                            $content['page_content_bottom_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            $content['page_content_bottom_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            $content['page_content_bottom_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            ////getting content for the content bottom left/right area
                            $content['page_content_bottom_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                            $content['page_content_bottom_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        }
                        return $this->render('//site/basic_page/index.php', $content);
                        ///END CUSTOM PAGE
                    }
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }

        return $this->render('//site/college/index', $content);
    }

    public function actionPage() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());


        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details) {
                    $content['page_content'] = \app\components\Utilities::getPageContentByUrl($url);
                    if ($content['page_content']) {
                        //side menu area
                        $content['side_menus'] = Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                        $content['side_menus_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        //getting data for the page top column 1,2 & 3
                        $content['page_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_top_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        ////getting content for the content top left/right area
                        $content['page_content_top_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_top_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        //contents for bottom middle area of the page
                        $content['page_content_middle_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        ////getting content for the content bottom area
                        $content['page_content_bottom_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_bottom_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_bottom_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        ////getting content for the content bottom left/right area
                        $content['page_content_bottom_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_bottom_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                    }
//            return $this->render('//site/basic_page/index.php', $content);
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }

        return $this->render('//site/basic_page/index.php', $content);
    }

   public function actionContacts() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);

            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details) {
                    $contacts_main = \app\models\Contacts::getActiveUnitsContacts($Academic_unit_details->Id);
                    $content['contacts_main'] = $contacts_main;
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            }
        }
        return $this->render('//site/college/contacts', $content);
    }

    public function actionPrograms() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                if ($Academic_unit_details) {
                    ////getting sie menu if any
                    $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                    //var_dump($content['side_menus']);
                    $content['side_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                    $language = Yii::$app->language;
                    $content['unit_details'] = $Academic_unit_details;
                    if (Yii::$app->request->post()) {
                        $Keyword = Yii::$app->request->post('ProgrameName');
                        $UnitID = $Academic_unit_details->Id;
                        $FieldOfStudy = Yii::$app->request->post('FieldStudy');
                        $programmeType = Yii::$app->request->post('PTYpe');

                        $page_content = \app\models\Programmes::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $programmeType, $FieldOfStudy, $language);
                        $content['page_content'] = $page_content;
                    } else {
                        $programmeType = $Keyword = $UnitID = $FieldOfStudy = NULL;
                        $UnitID = $Academic_unit_details->Id;
                        $url_section = explode('/', $url);
                        $Keyword = NULL;
                        // var_dump($url_section);
                        if (count($url_section) == 5 && isset($url_section[4]) && isset($url_section[3]) && ($url_section[3] == 'programs' OR $url_section[3] == 'programmes')) {
                            $Keyword = $url_section[4];
                        }

                        if (strlen($Keyword) > 1) {
                            $page_content = \app\models\Programmes::getProgrameDetailsByProgrammeUrl($Keyword);
                            $content['page_content'] = $page_content;
                            return $this->render('//site/college/programme_details', $content);
                        } else {
                            $page_content = \app\models\Programmes::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $programmeType, $FieldOfStudy, $language);
                            $content['page_content'] = $page_content;
                        }
                    }

                    ////////////////
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }

        return $this->render('//site/college/programmes', $content);
    }

    public function actionResearchs() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                if ($Academic_unit_details) {
                    ////getting sie menu if any
                    $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                    //var_dump($content['side_menus']);
                    $content['side_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                    $language = Yii::$app->language;
                    $content['unit_details'] = $Academic_unit_details;
                    if (Yii::$app->request->post()) {
                        $Keyword = Yii::$app->request->post('ResearchProjects');
                        $UnitID = $Academic_unit_details->Id;
                        $page_content = \app\models\ResearchProjects::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $language);
                        $content['page_content'] = $page_content;
                    } else {
                        $Keyword = $UnitID = NULL;
                        $UnitID = $Academic_unit_details->Id;
                        $url_section = explode('/', $url);
                        $Keyword = NULL;
                        if (count($url_section) == 5 && isset($url_section[4]) && isset($url_section[3]) && ($url_section[3] == 'programs' OR $url_section[3] == 'programmes')) {
                            $Keyword = $url_section[4];
                        }

                        if (strlen($Keyword) > 1) {
                            $page_content = \app\models\ResearchProjects::getProgrameDetailsByProgrammeUrl($Keyword);
                            $content['page_content'] = $page_content;
                            return $this->render('//site/college/research_details', $content);
                        } else {
                            $page_content = \app\models\ResearchProjects::getProgrammesByKeyWordUnitTypeFieldsOfStudy($Keyword, $UnitID, $language);
                            $content['page_content'] = $page_content;
                        }
                    }

                    ////////////////
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }

        return $this->render('//site/college/researchs', $content);
    }

    public function actionForbidden() {
        return $this->render('forbidden');
    }

    public function actionNews() {
        //getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                if ($Academic_unit_details) {
                    ////getting sie menu if any
                    $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                    //var_dump($content['side_menus']);
                    $content['side_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                    $language = Yii::$app->language;
                    $content['unit_details'] = $Academic_unit_details;
                    ////////////
                    if ($Academic_unit_details && count($url_sections) == 4) {
                        ///getting the lates 20 news to display
                        $page_content = \app\models\News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 20);
                        $content['page_content'] = $page_content;
                    } elseif (count($url_sections) > 4) {
                        $details = News::getDetailsByUrl($url);
                        $content['page_content'] = $details;
                        if ($details) {
                            $content['other_news'] = News::getLatestOtherNewsByIDStatusAndUnit($details->Id, News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 5, News::NEWS_TYPE_GENERIC_NEWS);
                        }
                        return $this->render('//site/college/news_details', $content);
                    } else {
                        $content['no_details'] = 'The requested page or section is not found';
                    }

                    ////////////////
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }
        return $this->render('//site/college/news_list', $content);
    }

    public function actionAnnouncements() {
        //getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());

        $url_sections = explode('/', $url);

        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                ////getting sie menu if any
                $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                //var_dump($content['side_menus']);
                $content['side_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                $language = Yii::$app->language;
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details && count($url_sections) == 4) {
                    ///getting the lates 20 news to display
                    $page_content = \app\models\Announcement::getLatestAnnouncementsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 20);
                    $content['page_content'] = $page_content;
                    ////////////////
                } elseif (count($url_sections) > 4) {
                    $details = Announcement::getDetailsByUrl($url);
                    $content['page_content'] = $details;
                    if ($details) {
                        $content['latest_announcements'] = Announcement::getLatestOtherAnnouncementsByIDStatusAndUnit($details->Id, Announcement::STATUS_PUBLISHED, $Academic_unit_details->Id, 5, Announcement::ANNOUNCEMENT_TYPE_GENERIC_ANNOUNCEMENT);
                    }
                    return $this->render('//site/college/announcement_details', $content);
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }
        return $this->render('//site/college/announcement_list', $content);
    }

    public function actionEvents() {
        //getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);

        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'college' OR $url_sections[1] == 'colleges' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                if ($Academic_unit_details) {
                    ////getting sie menu if any
                    $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                    //var_dump($content['side_menus']);
                    $content['side_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                    $language = Yii::$app->language;
                    $content['unit_details'] = $Academic_unit_details;
                    ///getting the lates 20 news to display
                    $page_content = \app\models\Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, $Academic_unit_details->Id, 20);
                    $content['page_content'] = $page_content;

                    ////////////
                    if ($Academic_unit_details && count($url_sections) == 4) {
                        ///getting the lates 20 news to display
                        $page_content = \app\models\Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, $Academic_unit_details->Id, 20, Events::EVENT_TYPE_GENERIC_EVENT);
                        $content['page_content'] = $page_content;
                    } elseif (count($url_sections) > 4) {
                        $details = Events::getDetailsByUrl($url);
                        $content['page_content'] = $details;
                        if ($details) {
                            $content['other_events'] = \app\models\Events::getLatestOtherEventsByStatusAndUnit($details->Id, Events::EVENT_STATUS_PUBLISHED, $Academic_unit_details->Id, 5, Events::EVENT_TYPE_GENERIC_EVENT);
                        }
                        return $this->render('//site/college/event_details', $content);
                    } else {
                        $content['no_details'] = 'The requested page or section is not found';
                    }

                    ////////////////
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }
        return $this->render('//site/college/events_list', $content);
    }

}
