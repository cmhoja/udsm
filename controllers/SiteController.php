<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;
use app\models\Events;
use app\models\News;
use app\models\Announcement;
use app\models\CustomBlocks;
use app\models\Video;
use app\models\MenuItem;
use app\models\Menu;
use app\components\SiteRegions;
use app\models\SlideShows;
use app\components\Utilities;

class SiteController extends Controller {

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
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
//                    [
//                        'actions' => ['login', 'index', 'basic-page'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                    'login' => ['post'],
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
    public function actionIndex($lang = NULL) {
        ///getting page url
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        if (empty($url) OR is_null($url) OR $url == 'index.php') {
            $content = array();
            ///contents for top area slide show
            $content['home_content_slideshow_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT, NULL, 0);
            $content['home_content_slideshow'] = SlideShows::getActiveLastestSlideShowsByUnitID(NULL, NULL);
            //getting data for the home page top area
            $content['events'] = Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, NULL, 3);
            $content['news'] = News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, NULL, 8, News::NEWS_TYPE_GENERIC_NEWS);
            $content['announcements'] = Announcement::getLatestAnnouncementsByStatusAndUnit(Announcement::STATUS_PUBLISHED, NULL, 3);
            //$content['content_homepage_botton_right_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, \app\components\SiteRegions::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT, NULL, 0);
            $content['content_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::MAIN_TEMPLATE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_HOME_PAGE);
            ///getting information for the home page bottom area
            $content['videos'] = FALSE;
            $videos = Video::getLatestVideosByStatusAndUnit(Video::STATUS_PUBLISHED, NULL, 5);
            $videos_list = NULL;
            if (isset($videos) && $videos) {
                foreach ($videos as $video) {
                    $videoLink = explode('=', $video->VideoLink);
                    if ($videoLink) {
                        $videos_list .= Trim("'" . $videoLink[count($videoLink) - 1] . "',");
                    }
                }
            }
            if ($videos_list) {
                $content['videos'] = TRUE;
                Yii::$app->view->params['videos'] = $videos_list;
            }
            $content['content_home_page_bottom_area_menu'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_OTHER_MENU, SiteRegions::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT, NULL, 0);

            ////getting contend to the content bottom area
            $content['content_bottom_column1'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, NULL);
            $content['content_bottom_column2'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, NULL);
            $content['content_bottom_column3'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, NULL);
            $content['content_bottom_column4'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, NULL);
            //getting contents for promotion are i.e MAIN_TEMPLATE_FOOTER_TOP_AREA
            $content['content_footer_top_area'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::MAIN_TEMPLATE_FOOTER_TOP_AREA, CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, NULL);
            return $this->render('home/index', $content);
        } else {
            // $this->redirect(['site/page', 'url' => $url]);
            // LOADING CUSTOM PAGE DETAILS
            //getting user current langauage;
            $page_side_menus = $page_content = $custom_blocks = NULL;
            $lang = Yii::$app->language;
            //$url = htmlspecialchars($url);   //OLD
            $url = html_entity_decode(htmlspecialchars(\app\components\Utilities::getPageUrl()));
//        $page_content = \app\models\BasicPage::getActivePageDetailsByUrl($url);
            $page_content = \app\components\Utilities::getPageContentByUrl($url);
            $content = array('page_content' => $page_content);
            if ($page_content) {
                //side menu area
                $content['side_menus_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $page_content->UnitID, $url);
                /////////////
                //getting data for the page top column 1,2 & 3
                $content['page_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['page_content_top_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['page_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                ////getting content for the content top left/right area
                $content['page_content_top_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['page_content_top_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                //contents for bottom middle area of the page
                $content['page_content_middle_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                ////getting content for the content bottom area
                $content['page_content_bottom_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['page_content_bottom_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['page_content_bottom_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                ////getting content for the content bottom left/right area
                $content['page_content_bottom_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                $content['page_content_bottom_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
                /////////
            }
            //$content = array('page_content' => $page_content, 'side_menus' => $page_side_menus, 'custom_blocks' => $custom_blocks);
            return $this->render('//site/basic_page', $content);
        }
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContacts() {
        $contacts_main = \app\models\Contacts::getActiveMainSiteContacts();
        $contacts_others = \app\models\Contacts::getActiveOtherUnitsContacts();
        return $this->render('//site/pages/contacts', [
                    'contacts_main' => $contacts_main, 'contacts_others' => $contacts_others
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionPage($url) {
        //getting user current langauage;
        $page_side_menus = $page_content = $custom_blocks = NULL;
        $lang = Yii::$app->language;
        //$url = htmlspecialchars($url);   //OLD
        $url = html_entity_decode(htmlspecialchars(\app\components\Utilities::getPageUrl()));
//        $page_content = \app\models\BasicPage::getActivePageDetailsByUrl($url);
        $page_content = \app\components\Utilities::getPageContentByUrl($url);
        $content = array('page_content' => $page_content);
        if ($page_content) {
            //side menu area
            $content['side_menus_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['side_menus'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $page_content->UnitID, $url);
            /////////////
            //getting data for the page top column 1,2 & 3
            $content['page_content_top_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['page_content_top_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['page_content_top_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            ////getting content for the content top left/right area
            $content['page_content_top_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['page_content_top_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            //contents for bottom middle area of the page
            $content['page_content_middle_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            ////getting content for the content bottom area
            $content['page_content_bottom_column1_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['page_content_bottom_column2_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['page_content_bottom_column3_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            ////getting content for the content bottom left/right area
            $content['page_content_bottom_left_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            $content['page_content_bottom_right_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, $page_content->UnitID);
            /////////
        }

        return $this->render('//site/basic_page', $content);
    }

    /**
     * Displays forbidden page.
     *
     * @return string
     */
    public function actionForbidden() {
        return $this->render('forbidden');
    }

    function actionStudentCorner() {
        $page_side_menus = $page_content = $custom_blocks = NULL;
        $lang = Yii::$app->language;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $page_content['quick_links'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, \app\components\SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, NULL, $url);
        $page_content['latest_events'] = Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, NULL, 5, Events::EVENT_TYPE_STUDENT_EVENT);
        $page_content['latest_news'] = News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, NULL, 5, News::NEWS_TYPE_STUDENT_NEWS);
        $page_content['campus_life'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, NULL);
        $page_content['top_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_TOP_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, NULL);
        $page_content['bottom_blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, NULL);
        return $this->render('//site/pages/student_corner', ['page_content' => $page_content]);
    }

    function actionStaffCorner() {
        $page_side_menus = $page_content = $custom_blocks = NULL;
        $lang = Yii::$app->language;
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());

        $page_content['quick_links'] = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, \app\components\SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, NULL, $url);
        $page_content['latest_events'] = Events::getLatestEventsByStatusAndUnit(Events::EVENT_STATUS_PUBLISHED, NULL, 5, Events::EVENT_TYPE_STAFF_EVENT);
        $page_content['latest_news'] = News::getLatestNewsByStatusAndUnit(News::NEWS_STATUS_PUBLISHED, NULL, 5, News::NEWS_TYPE_STAFF_NEWS);
        $page_content['latest_announcements'] = Announcement::getLatestAnnouncementsByStatusAndUnit(Announcement::STATUS_PUBLISHED, NULL, 5, Announcement::ANNOUNCEMENT_TYPE_STAFF_ANNOUNCEMENT);
        return $this->render('//site/pages/staff_corner', ['page_content' => $page_content]);
    }

    public function actionSocialMedia() {

        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $contents['social_media'] = \app\models\SocialMediaAccounts::getActiveAccountsByUnitID();
        $contents['blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, NULL);

        return $this->render('//site/pages/social_media', [
                    'content' => $contents
        ]);
    }

    /*
     * process the customr language change proposal
     */

    public function actionLanguage() {
        $url = '';
        $url_key_link = Yii::$app->request->get();
        if (is_array($url_key_link) && isset($url_key_link['key']) && isset($url_key_link['page_url'])) {
            $lang = \yii\helpers\Html::encode(trim($url_key_link['key']));
            $url = \yii\helpers\Html::encode(trim($url_key_link['page_url']));
            $supportedLanguages = \Yii::$app->params['supportedLanguages'];
            if (isset($supportedLanguages[$lang]) && !empty($supportedLanguages[$lang])) {
                Yii::$app->language = $lang;
                Yii::$app->session->set('lang', Yii::$app->language);
            } else {
                // Yii::$app->language = Yii::$app->params['language'];
                Yii::$app->session->set('lang', Yii::$app->language);
            }
        } else {
            //Yii::$app->language = Yii::$app->params['language'];
            Yii::$app->session->set('lang', Yii::$app->language);
        }
        $this->redirect(Utilities::generateUrl($url));
    }

    public function actionDirectory() {
        $keyword = NULL;
        $data = array();
        $url = html_entity_decode(\app\components\Utilities::getPageUrl());
        $url_keyword = explode('/', $url);
        if (count($url_keyword) == 3 && isset($url_keyword[1]) && $url_keyword[1] == 'directory') {
            $keyword = html_entity_decode($url_keyword[2]);
        }
        if ($keyword) {
            //getting pages
            $pages = \app\models\BasicPage::find()
                    ->select('PageTitleEn,PageTitleSw,PageSeoUrl')
                    ->where('UnitID IS NULL AND Status=:status', [':status' => \app\models\BasicPage::STATUS_PUBLISHED])
                    ->where('PageTitleEn LIKE "' . strtolower($keyword) . '%" OR  PageTitleEn LIKE "' . strtoupper($keyword) . '%"')
                    ->orWhere('PageTitleSw LIKE "' . strtolower($keyword) . '%" OR  PageTitleSw LIKE "' . strtoupper($keyword) . '%"')
                    ->all();
            foreach ($pages as $page) {
                array_push($data, array(
                    'nameEn' => $page->PageTitleEn, 'nameSw' => $page->PageTitleSw, 'url' => $page->PageSeoUrl
                ));
            }

            //getting announcements
            $announcements = Announcement::find()
                    ->select('TitleEn,TitleSw,LinkUrl')
                    ->where('UnitID IS NULL AND Status=:status', [':status' => Announcement::STATUS_PUBLISHED])
                    ->where('TitleEn LIKE "' . strtolower($keyword) . '%" OR  TitleEn LIKE "' . strtoupper($keyword) . '%"')
                    ->orWhere('TitleSw LIKE "' . strtolower($keyword) . '%" OR  TitleSw LIKE "' . strtoupper($keyword) . '%"')
                    ->all();

            foreach ($announcements as $announcement) {
                array_push($data, array(
                    'nameEn' => $announcement->TitleEn, 'nameSw' => $announcement->TitleSw, 'url' => $announcement->LinkUrl
                ));
            }
            ///getting blocks
            $blocks = CustomBlocks::find()
                    ->select('BlockTitleEn,BlockTitleSw,LinkToPage')
                    ->where('BlockUnitID IS NULL AND Status=:status', [':status' => Announcement::STATUS_PUBLISHED])
                    ->where('BlockTitleEn LIKE "' . strtolower($keyword) . '%" OR  BlockTitleEn LIKE "' . strtoupper($keyword) . '%"')
                    ->orWhere('BlockTitleSw LIKE "' . strtolower($keyword) . '%" OR  BlockTitleSw LIKE "' . strtoupper($keyword) . '%"')
                    ->all();
            foreach ($blocks as $block) {
                array_push($data, array(
                    'nameEn' => $block->BlockTitleEn, 'nameSw' => $block->BlockTitleSw, 'url' => $block->LinkToPage
                ));
            }
            ///getting events
            $events = Events::find()
                    ->select('EventTitleEn,EventTitleSw,EventUrl')
                    ->where('UnitID IS NULL AND Status=:status', [':status' => Announcement::STATUS_PUBLISHED])
                    ->where('EventTitleEn LIKE "' . strtolower($keyword) . '%" OR  EventTitleEn LIKE "' . strtoupper($keyword) . '%"')
                    ->orWhere('EventTitleSw LIKE "' . strtolower($keyword) . '%" OR  EventTitleSw LIKE "' . strtoupper($keyword) . '%"')
                    ->all();

            foreach ($events as $event) {
                array_push($data, array(
                    'nameEn' => $event->EventTitleEn, 'nameSw' => $event->EventTitleSw, 'url' => $event->EventUrl
                ));
            }
            ///getting Programs
            $programs = \app\models\Programmes::find()
                    ->select('ProgrammeNameEn,ProgrammeNameSw,ProgrammeUrl')
                    ->where('UnitID IS NULL AND Status=:status', [':status' => Announcement::STATUS_PUBLISHED])
                    ->where('ProgrammeNameEn LIKE "' . strtolower($keyword) . '%" OR  ProgrammeNameEn LIKE "' . strtoupper($keyword) . '%"')
                    ->orWhere('ProgrammeNameSw LIKE "' . strtolower($keyword) . '%" OR  ProgrammeNameSw LIKE "' . strtoupper($keyword) . '%"')
                    ->all();
            foreach ($programs as $program) {
                array_push($data, array(
                    'nameEn' => $program->ProgrammeNameEn, 'nameSw' => $program->ProgrammeNameSw, 'url' => $program->ProgrammeUrl
                ));
            }
            ///getting research
            $researchs = \app\models\ResearchProjects::find()
                    ->select('ProjectNameEn,ProjectNameSw,ProjectLinkUrl')
                    ->where('UnitID IS NULL AND Status=:status', [':status' => Announcement::STATUS_PUBLISHED])
                    ->where('ProjectNameEn LIKE "' . strtolower($keyword) . '%" OR  ProjectNameEn LIKE "' . strtoupper($keyword) . '%"')
                    ->orWhere('ProjectNameSw LIKE "' . strtolower($keyword) . '%" OR  ProjectNameSw LIKE "' . strtoupper($keyword) . '%"')
                    ->all();
            foreach ($researchs as $research) {
                array_push($data, array(
                    'nameEn' => $research->ProjectNameEn, 'nameSw' => $research->ProjectNameSw, 'url' => $research->ProjectLinkUrl
                ));
            }
        }
        $contents['page_content'] = $data;
        $contents['blocks'] = CustomBlocks::getActiveBlocksByRegionId(SiteRegions::CUSTOM_PAGE_CONTENT_MIDDLE, CustomBlocks::BLOCK_TYPE_CUSTOM_PAGE, $url, NULL);

        return $this->render('//site/pages/directory', [
                    'content' => $contents
        ]);
    }

}
