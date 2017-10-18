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

class CentresController extends Controller {

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

    public function init() {
        $this->layout = 'college/main';
        parent::init();
        ///setting unit details
        Yii::$app->view->params['unit_name'] = Yii::$app->view->params['unit_id'] = NULL;
        Yii::$app->view->params['unit_logo'] = NULL;
        Yii::$app->view->params['unit_abbreviation_code'] = NULL;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centre' OR $url_sections[1] == 'centres' )) {
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
// echo $url;
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centre' OR $url_sections[1] == 'centres' )) {
////getting the landing page por a given college 
            $unit_abbreviation = trim($url_sections[2]);

            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details) {
                    $content['home_content_slideshow'] = SlideShows::getActiveLastestSlideShowsByUnitID($Academic_unit_details->Id, 5);
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
                    $content['home_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_top_column2_announcements'] = Announcement::getLatestAnnouncementsByStatusAndUnit(Announcement::STATUS_PUBLISHED, $Academic_unit_details->Id, 5);
                    $content['home_content_top_column3_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT, $Academic_unit_details->Id, 0);
                    $content['home_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);

                    //////contents for the home page news( or content middle left) and propotion area ( or content middle right)
                    $content['home_content_middle_left_news'] = News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 4);
                    $content['home_content_middle_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    ////contents for events area of the home page
                    $content['home_content_events'] = Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, $Academic_unit_details->Id, 6);

                    ////getting contend to the content bottom area
                    $content['home_content_bottom_column1'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_bottom_column2'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_bottom_column3'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    //getting contents for promotion are i.e MAIN_TEMPLATE_FOOTER_TOP_AREA
                    //var_dump($content['home_content_top_column3_menus']);
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
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centre' OR $url_sections[1] == 'centres' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details) {
                    $content['page_content'] = \app\models\BasicPage::getActivePageAllDetailsByUrl($url, $Academic_unit_details->Id);
                    if ($content['page_content']) {
                        $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $Academic_unit_details->Id, $url);
                        $content['side_menus_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);

//getting data for the page top column 1,2 & 3
//                    $content['page_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
//                    $content['page_content_top_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
//                    $content['page_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        //contents for bottom middle area of the page
                        $content['page_content_middle_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        ////getting content for the content bottom area
                        $content['page_content_bottom_column1'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_bottom_column2'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_bottom_column3'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        ////getting content for the content bottom left/right area
                        $content['page_content_bottom_left'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                        $content['page_content_bottom_right'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $Academic_unit_details->Id);
                    }
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }

        return $this->render('//site/college/basic_page', $content);
    }

    public function actionPrograms() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centre' OR $url_sections[1] == 'centres' )) {
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

    public function actionResearch() {
//getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centre' OR $url_sections[1] == 'centres' )) {
            ///getting pgae details
            $unit_abbreviation = trim($url_sections[2]);
//            var_dump($url);
            if (!empty($unit_abbreviation)) {
                $Academic_unit_details = \app\models\AcademicAdministrativeUnit::find()->where(array('UnitAbreviationCode' => $unit_abbreviation, 'ParentUnitId' => 0))->one();
                $content['unit_details'] = $Academic_unit_details;
                if ($Academic_unit_details) {
                    $content['page_details'] = \app\models\BasicPage::getActivePageDetailsByUrl($url, $Academic_unit_details->Id);

                    $content['home_content_slideshow_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    //getting data for the home page top column 1,2 & 3
                    $content['home_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_top_column3_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT, $Academic_unit_details->Id, 0);
                    $content['home_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_middle_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);

                    ////getting contend to the content bottom area
                    $content['home_content_bottom_column1'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_bottom_column2'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                    $content['home_content_bottom_column3'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $Academic_unit_details->Id);
                } else {
                    $content['no_details'] = 'The requested page or section is not found';
                }
            } else {
                $content['no_details'] = 'The requested page or section is not found';
            }
        }

        return $this->render('//site/college/basic_page', $content);
    }

    public function actionForbidden() {
        return $this->render('forbidden');
    }

    public function actionNews() {
        //getting user current langauage;
        $content = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_sections = explode('/', $url);
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centres' OR $url_sections[1] == 'centres' )) {
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
                    $page_content = \app\models\News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 20);
                    $content['page_content'] = $page_content;

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
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centres' OR $url_sections[1] == 'centress' )) {
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
                    $page_content = \app\models\News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, $Academic_unit_details->Id, 20);
                    $content['page_content'] = $page_content;

                    ////////////////
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
        if (isset($url_sections[1]) && isset($url_sections[2]) && ($url_sections[1] == 'centres' OR $url_sections[1] == 'centres' )) {
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
