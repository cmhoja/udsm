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

class ConnectController extends Controller {

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
    public function actionAnnouncements() {
        //getting user current langauage;
        $page_side_menus = $page_content = NULL;
        $url = \app\components\Utilities::getPageUrl();
        $url_sections = explode('/', $url);
        if (isset($url_sections[count($url_sections) - 1]) && $url_sections[count($url_sections) - 1] == 'announcements') {
            $page_content = \app\models\Announcement::getLatestAnnouncementsByStatusAndUnit(\app\models\Announcement::STATUS_PUBLISHED, NULL, 15, \app\models\Announcement::ANNOUNCEMENT_TYPE_GENERIC_ANNOUNCEMENT);
//            if ($page_content) {
//                //  $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $page_content->UnitID, $url);
//            }
            $content = array('announcements' => $page_content, 'side_menus' => $page_side_menus);
            return $this->render('//site/pages/announcement', $content);
        } elseif (count($url_sections) > 2 && isset($url_sections[count($url_sections) - 2]) && $url_sections[count($url_sections) - 2] == 'announcements') {
            ///get single news details
            $page_content = \app\models\Announcement::find()->where(array('LinkUrl' => trim($url_sections[count($url_sections) - 1])))->one();
            $page_content2 = NULL;
            if ($page_content && $page_content->Id) {
                $page_content2 = \app\models\Announcement::getLatestOtherAnnouncementsByIDStatusAndUnit($page_content->Id, \app\models\Announcement::STATUS_PUBLISHED, NULL, 8, \app\models\Announcement::ANNOUNCEMENT_TYPE_GENERIC_ANNOUNCEMENT);
            }
            $content = array('announcements' => $page_content, 'latest_announcements' => $page_content2);
            return $this->render('//site/pages/announcement_details', $content);
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionNewsAndEvents() {
        //getting user current langauage;
        $page_side_menus = $page_content = NULL;
        $url = \app\components\Utilities::getPageUrl();
        $page_content1 = \app\models\News::getLatestNewsByStatusAndUnit(\app\models\News::NEWS_STATUS_PUBLISHED, NULL, 5, \app\models\News::NEWS_TYPE_GENERIC_NEWS);
        $page_content2 = \app\models\Events::getLatestEventsByStatusAndUnit(\app\models\News::NEWS_STATUS_PUBLISHED, NULL, 5);

        $content = array('news' => $page_content1, 'events' => $page_content2);
        return $this->render('//site/pages/news_events', $content);
    }

    /**
     * Displays forbidden page.
     *
     * @return string
     */
    public function actionForbidden() {
        return $this->render('//site/forbidden');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionNews() {
//        echo 'news';
//        exit;
        //getting user current langauage;
        $page_side_menus = $page_content = NULL;
        $url = \app\components\Utilities::getPageUrl();
        //echo $url;
        $url_sections = explode('/', $url);
        //var_dump($url_sections);
        if (isset($url_sections[count($url_sections) - 1]) && $url_sections[count($url_sections) - 1] == 'news') {
            $page_content = \app\models\News::getLatestNewsByStatusAndUnit(\app\models\News::NEWS_STATUS_PUBLISHED, NULL, NULL, \app\models\News::NEWS_TYPE_GENERIC_NEWS);
//            if ($page_content) {
//                //  $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $page_content->UnitID, $url);
//            }
            $content = array('news' => $page_content, 'side_menus' => $page_side_menus);
            return $this->render('//site/pages/news', $content);
        } elseif (count($url_sections) > 2 && isset($url_sections[count($url_sections) - 2]) && $url_sections[count($url_sections) - 2] == 'news') {
            ///get single news details
            $page_content = \app\models\News::find()->where(array('LinkUrl' => trim($url_sections[count($url_sections) - 1])))->one();
            $page_content2 = NULL;
            if ($page_content && $page_content->Id) {
                $page_content2 = \app\models\News::getLatestOtherNewsByIDStatusAndUnit($page_content->Id, \app\models\News::NEWS_STATUS_PUBLISHED, NULL, 8, \app\models\News::NEWS_TYPE_GENERIC_NEWS);
            }
            $content = array('news' => $page_content, 'latest_news' => $page_content2);
            return $this->render('//site/pages/news_details', $content);
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionEvents() {
        //getting user current langauage;

        $page_side_menus = $page_content = NULL;
        $url = \app\components\Utilities::getPageUrl();
        $url_sections = explode('/', $url);
        //var_dump($url_sections);
        if (isset($url_sections[count($url_sections) - 1]) && $url_sections[count($url_sections) - 1] == 'events') {
            $page_content = \app\models\Events::getLatestEventsByStatusAndUnit(\app\models\News::NEWS_STATUS_PUBLISHED, NULL, NULL);
            if ($page_content) {
                //  $page_side_menus = MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(Menu::MENU_TYPE_SIDE_MENU, SiteRegions::CUSTOM_PAGE_CONTENT_SIDE_MENU, $page_content->UnitID, $url);
            }
            $content = array('events' => $page_content, 'side_menus' => $page_side_menus);
            return $this->render('//site/pages/events', $content);
        } elseif (count($url_sections) > 2 && isset($url_sections[count($url_sections) - 2]) && $url_sections[count($url_sections) - 2] == 'events') {
            ///get single news details
            $page_content = \app\models\Events::find()->where(array('EventUrl' => trim($url_sections[count($url_sections) - 1])))->one();
            $page_content2 = NULL;
            if ($page_content) {
                $page_content2 = \app\models\Events::getLatestOtherEventsByStatusAndUnit($page_content->Id, \app\models\Events::EVENT_STATUS_PUBLISHED, NULL, 8);
            }
            $content = array('events' => $page_content, 'latest_events' => $page_content2);
            return $this->render('//site/pages/events_details', $content);
        }
    }

}
