<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\web\ForbiddenHttpException;

/**
 * Description of MainSiteRegions
 *
 * @author charles
 */
class SiteRegions {

    ///region areas for the Main website
    //These regions are for the home page only of the main websites
    //header regions
    //Areas/REgions for Main Home page Template
    const MAIN_TEMPLATE_HEADER_TOP_LEFT = 1;
    const MAIN_TEMPLATE_HEADER_TOP_RIGHT = 2;
    const MAIN_TEMPLATE_HEADER_LOGO = 3;
    const MAIN_TEMPLATE_HEADER_MAIN_MENU = 4;
    /////home page slide show
    const MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT = 5;
    const MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT = 6;
    ///content area available in all pages
    const MAIN_TEMPLATE_CONTENT_TOP_LEFT = 7;
    const MAIN_TEMPLATE_CONTENT_TOP_CENTRE = 8;
    const MAIN_TEMPLATE_CONTENT_TOP_RIGHT = 9;
    const MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA = 10;
    const MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT = 11;
    const MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT = 12;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 = 13;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 = 14;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 = 15;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 = 16;
    ///foooter regions
    const MAIN_TEMPLATE_FOOTER_TOP_AREA = 17;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 = 18;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 = 19;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 = 20;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 = 21;
///end og constants for Main homepage blocks
    ///AREA/REGIONS For Custom Page Block Placements
    const CUSTOM_PAGE_CONTENT_TOP_COLUMN1 = 111;
    const CUSTOM_PAGE_CONTENT_TOP_COLUMN2 = 112;
    const CUSTOM_PAGE_CONTENT_TOP_COLUMN3 = 113;
    const CUSTOM_PAGE_CONTENT_TOP_LEFT = 114;
    const CUSTOM_PAGE_CONTENT_TOP_RIGHT = 115;
    const CUSTOM_PAGE_CONTENT_MIDDLE = 116;
    const CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1 = 117;
    const CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2 = 118;
    const CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3 = 119;
    const CUSTOM_PAGE_CONTENT_BOTTOM_LEFT = 110;
    const CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT = 111;
    const CUSTOM_PAGE_CONTENT_SIDE_MENU = 112;

    //put your code here


    static function getAllPlacementRegions() {
        return array(
            self::MAIN_TEMPLATE_HEADER_TOP_LEFT => 'Home Header-Top Left',
            self::MAIN_TEMPLATE_HEADER_TOP_RIGHT => 'Home Header-Top Right',
            self::MAIN_TEMPLATE_HEADER_LOGO => 'Home Header - Logo',
            self::MAIN_TEMPLATE_HEADER_MAIN_MENU => 'Home Header-Main Menu',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'Home SlideShow-Left',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'Home SlideShow-Right',
            self::MAIN_TEMPLATE_CONTENT_TOP_LEFT => 'Content Top-Left',
            self::MAIN_TEMPLATE_CONTENT_TOP_CENTRE => 'Content Top-Centre',
            self::MAIN_TEMPLATE_CONTENT_TOP_RIGHT => 'Content Top-Right',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA => 'Content News Area',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT => 'Content Bottom-Left',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT => 'Content Bottom-Right',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 => 'Content Bottom-Column 1',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 => 'Content Bottom-Column 2',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 => 'Content Bottom-Column 3',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 => 'Content Bottom-Column 4',
            self::MAIN_TEMPLATE_FOOTER_TOP_AREA => 'Footer Top Area',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Footer Bottom-Column 1',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'Footer Bottom-Column 2',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'Footer Bottom-Column 3',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'Footer Bottom-Column 4',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN1 => 'Page Content Top-Column1',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN2 => 'Page Content Top-Column2',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN3 => 'Page Content Top-Column3',
            self::CUSTOM_PAGE_CONTENT_TOP_LEFT => 'Page Content Top-Left',
            self::CUSTOM_PAGE_CONTENT_TOP_RIGHT => 'Page Content Top-Right',
            self::CUSTOM_PAGE_CONTENT_MIDDLE => 'Page Content Middle Area',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1 => 'Page Content Bottom-Column1',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2 => 'Page Content Bottom-Column2',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3 => 'Page Content Bottom-Column3',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT => 'Page Content Bottom-Left',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT => 'Page Content Bottom-Right',
            self::CUSTOM_PAGE_CONTENT_SIDE_MENU => 'Page Side Menu Area'
        );
    }

    static function getMainHomeTemplateRegions() {
        return array(
            //self::MAIN_TEMPLATE_HEADER_TOP_LEFT => 'Home Header-Top Left',
            //self::MAIN_TEMPLATE_HEADER_TOP_RIGHT => 'Home Header-Top Right',
            //self::MAIN_TEMPLATE_HEADER_LOGO => 'Home Header - Logo',
            //self::MAIN_TEMPLATE_HEADER_MAIN_MENU => 'Home Header-Main Menu',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'Home SlideShow-Left',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'Home SlideShow-Right',
            self::MAIN_TEMPLATE_CONTENT_TOP_LEFT => 'Content Top-Left',
            self::MAIN_TEMPLATE_CONTENT_TOP_CENTRE => 'Content Top-Centre',
            self::MAIN_TEMPLATE_CONTENT_TOP_RIGHT => 'Content Top-Right',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA => 'Content News Area',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT => 'Content Bottom-Left',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT => 'Content Bottom-Right',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 => 'Content Bottom-Column 1',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 => 'Content Bottom-Column 2',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 => 'Content Bottom-Column 3',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 => 'Content Bottom-Column 4',
            self::MAIN_TEMPLATE_FOOTER_TOP_AREA => 'Footer Top Area',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Footer Bottom-Column 1',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'Footer Bottom-Column 2',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'Footer Bottom-Column 3',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'Footer Bottom-Column 4',
        );
    }

    /*
     * returnd the areas/regions where the menu can be placed in the home page of the main website
     */

    static function getMainHomeTemplateMenuRegions() {
        return array(
            //self::MAIN_TEMPLATE_HEADER_TOP_LEFT => 'Home Header-Top Left',
            self::MAIN_TEMPLATE_HEADER_TOP_RIGHT => 'Home Header-Top Right',
            //self::MAIN_TEMPLATE_HEADER_LOGO => 'Home Header - Logo',
            self::MAIN_TEMPLATE_HEADER_MAIN_MENU => 'Home Header-Main Menu',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'Home SlideShow-Left',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'Home SlideShow-Right',
            self::MAIN_TEMPLATE_CONTENT_TOP_LEFT => 'Content Top-Left',
            self::MAIN_TEMPLATE_CONTENT_TOP_CENTRE => 'Content Top-Centre',
            self::MAIN_TEMPLATE_CONTENT_TOP_RIGHT => 'Content Top-Right',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA => 'Content News Area',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT => 'Content Bottom-Left',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT => 'Content Bottom-Right',
            self::MAIN_TEMPLATE_FOOTER_TOP_AREA => 'Footer Top Area',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Footer Bottom-Column 1',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'Footer Bottom-Column 2',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'Footer Bottom-Column 3',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'Footer Bottom-Column 4',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Footer Bottom-Column 1',
            self::CUSTOM_PAGE_CONTENT_SIDE_MENU => 'Page Side Menu Area',
        );
    }

    static function getCustomPageTemplateRegions() {
        return array(
            self::CUSTOM_PAGE_CONTENT_SIDE_MENU => 'Page Side Menu Area',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN1 => 'Page Content Top-Column1',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN2 => 'Page Content Top-Column2',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN3 => 'Page Content Top-Column3',
            self::CUSTOM_PAGE_CONTENT_TOP_LEFT => 'Page Content Top-Left',
            self::CUSTOM_PAGE_CONTENT_TOP_RIGHT => 'Page Content Top-Right',
            self::CUSTOM_PAGE_CONTENT_MIDDLE => 'Page Content Middle Area',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1 => 'Page Content Bottom-Column1',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2 => 'Page Content Bottom-Column2',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3 => 'Page Content Bottom-Column3',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT => 'Page Content Bottom-Left',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT => 'Page Content Bottom-Right',
        );
    }

}
