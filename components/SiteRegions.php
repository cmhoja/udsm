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
    const MAIN_TEMPLATE_HEADER_TOP_LEFT = 'MT_HTL'; // 1;
    const MAIN_TEMPLATE_HEADER_TOP_RIGHT = 'MT_HTR'; // 2;
    const MAIN_TEMPLATE_HEADER_LOGO = 'MT_HLG'; //3;
    const MAIN_TEMPLATE_HEADER_MAIN_MENU = 'MT_HMN'; // 4;
    /////home page slide show
    const MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT = 'MT_HSL'; //5;
    const MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT = 'MT_HSR'; //6;
    ///content area available in all pages
    const MAIN_TEMPLATE_CONTENT_TOP_LEFT = 'MT_CTL'; //7;
    const MAIN_TEMPLATE_CONTENT_TOP_CENTRE = 'MT_CTC'; //8;
    const MAIN_TEMPLATE_CONTENT_TOP_RIGHT = 'MT_CTR'; //9;
    const MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA = 'MT_CHNA'; // 10;
    const MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT = 'MT_CHBL'; //11;
    const MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT = 'MT_CHBR'; //12;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 = 'MT_CBC1'; //13;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 = 'MT_CBC2'; //14;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 = 'MT_CBC3'; //15;
    const MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 = 'MT_CBC4'; //16;
    ///foooter regions
    const MAIN_TEMPLATE_FOOTER_TOP_AREA = 'MT_FTA'; //17;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 = 'MT_FBC1'; //18;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 = 'MT_FBC2'; //19;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 = 'MT_FBC3'; //20;
    const MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 = 'MT_FBC4'; //21;
///end og constants for Main homepage blocks
    /////
    ///COLLEGE PAGES BLOCK & MENU REGIONS FOR COLLEGES TEMPLATE
    const COLLEGE_TEMPLATE_HEADER_MAIN_MENU = 'CT_HMM'; //22;
    const COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT = 'CT_HSL'; // 23;
    const COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT = 'CT_HSR'; //24;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT = 'CT_HCTL'; //25;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_MIDDLE = 'CT_HCTM'; //26;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT = 'CT_HCTR'; //27;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_EVENTS_AREA = 'CT_HCEA'; //28;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE_LEFT = 'CT_HCML'; //29;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT = 'CT_HCMR'; //30;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1 = 'CT_HCBC1'; //31;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2 = 'CT_HCBC2'; //32;
    const COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3 = 'CT_HCBC3'; //33;
    const COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1 = 'CT_FBC1'; // 34;
    const COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN2 = 'CT_FBC2'; //  35;
    const COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN3 = 'CT_FBC3'; // 36;
    const COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN4 = 'CT_FBC4'; //37;
    ///AREA/REGIONS For Custom Page Block Placements
    const CUSTOM_PAGE_CONTENT_TOP_COLUMN1 = 'CP_CTC1'; // 38;
    const CUSTOM_PAGE_CONTENT_TOP_COLUMN2 = 'CP_CTC2'; // 39;
    const CUSTOM_PAGE_CONTENT_TOP_COLUMN3 = 'CP_CTC3'; //  40;
    const CUSTOM_PAGE_CONTENT_TOP_LEFT = 'CP_CTL'; // 41;
    const CUSTOM_PAGE_CONTENT_TOP_RIGHT = 'CP_CTR'; // 42;
    const CUSTOM_PAGE_CONTENT_MIDDLE = 'CP_CM'; // 43;
    const CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1 = 'CP_CBC1'; //  44;
    const CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2 = 'CP_CBC2'; //  45;
    const CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3 = 'CP_CBC3'; // 46;
    const CUSTOM_PAGE_CONTENT_BOTTOM_LEFT = 'CP_CBL'; // 47;
    const CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT = 'CP_CBR'; // 48;
    const CUSTOM_PAGE_CONTENT_SIDE_MENU = 'CP_CSM'; // 49;

    //put your code here

    static function getAllPlacementRegions() {
        return array(
            //MAIN TAMPLATE REGIONS
            self::MAIN_TEMPLATE_HEADER_TOP_LEFT => 'Main Template Header Top Left Region',
            self::MAIN_TEMPLATE_HEADER_TOP_RIGHT => 'Main Template Header Top Right Region',
            self::MAIN_TEMPLATE_HEADER_LOGO => 'Main Template Header  Logo Region',
            self::MAIN_TEMPLATE_HEADER_MAIN_MENU => 'Main Template Header-Main Menu Region',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'Main Template Home SlideShow Left Region',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'Main Template Home SlideShow Right Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_LEFT => 'Main Template Content Top Left Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_CENTRE => 'Main Template Content Top Centre Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_RIGHT => 'Main Template Content Top Right Region',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA => 'Main Template Content News  Region',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT => 'Main Template Content Bottom Left Region',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT => 'Main Template Content Bottom Right Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 => 'Main Template Content Bottom Column 1 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 => 'Main Template Content Bottom Column 2 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 => 'Main Template Content Bottom Column 3 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 => 'Main Template Content Bottom Column 4 Region',
            self::MAIN_TEMPLATE_FOOTER_TOP_AREA => 'Main Template Footer Top Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Main Template Footer Bottom Column 1 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'Main Template Footer Bottom Column 2 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'Main Template Footer Bottom Column 3 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'Main Template Footer Bottom Column 4 Region',
            //
            ///CUSTOM PAGE REGIONS
            self::CUSTOM_PAGE_CONTENT_SIDE_MENU => 'Custom Page Side Menu Region',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN1 => 'Custom Page Content Top-Column1 Region',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN2 => 'Custom Page Content Top-Column2 Region',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN3 => 'Custom Page Content Top-Column3 Region',
            self::CUSTOM_PAGE_CONTENT_TOP_LEFT => 'Custom Page Content Top-Left Region',
            self::CUSTOM_PAGE_CONTENT_TOP_RIGHT => 'Custom Page Content Top-Right Region',
            self::CUSTOM_PAGE_CONTENT_MIDDLE => 'Custom Page Content Middle  Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1 => 'Custom Page Content Bottom Column1 Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2 => 'Custom Page Content Bottom Column2 Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3 => 'Custom Page Content Bottom Column3 Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT => 'Custom Page Content Bottom Left Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT => 'Custom Page Content Bottom Right Region',
            //
            //COLLEGE TEMPLATE REGIONS
            self::COLLEGE_TEMPLATE_HEADER_MAIN_MENU => 'College Template- Header Main Menu Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'College Template - Home Page Slideshow Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'College Template - Home Page Slideshow Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT => 'College Template - Home Page Content Top Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_MIDDLE => 'College Template - Home Page Content Top Middle Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT => 'College Template - Home Page Content Top Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE_LEFT => 'College Template - Home Page Content Middle Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT => 'College Template - Home Page Content Middle Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_EVENTS_AREA => 'College Template - Home Page Content Events Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1 => 'College Template- Home Page Content Bottom Column1 Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2 => 'College Template- Home Page Content Bottom Column2 Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3 => 'College Template- Home Page Content Bottom Column3 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'College Template - Footer Column1 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'College Template - Footer Column2 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'College Template - Footer Column3 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'College Template - Footer Column4 Region',
        );
    }

    static function getMainHomeTemplateRegions() {
        $regions1 = array(
            //MAIN TAMPLATE REGIONS
            //self::MAIN_TEMPLATE_HEADER_TOP_LEFT => 'Main Template Header Top Left Region',
            self::MAIN_TEMPLATE_HEADER_TOP_RIGHT => 'Main Template Header Top Right Region',
            // self::MAIN_TEMPLATE_HEADER_LOGO => 'Main Template Header  Logo Region',
            self::MAIN_TEMPLATE_HEADER_MAIN_MENU => 'Main Template Header-Main Menu Region',
            //self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'Main Template Home SlideShow Left Region',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'Main Template Home SlideShow Right Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_LEFT => 'Main Template Content Top Left Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_CENTRE => 'Main Template Content Top Centre Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_RIGHT => 'Main Template Content Top Right Region',
            //self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA => 'Main Template Content News  Region',
            // self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT => 'Main Template Content Bottom Left Region',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT => 'Main Template Content Bottom Right Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 => 'Main Template Content Bottom Column 1 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 => 'Main Template Content Bottom Column 2 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 => 'Main Template Content Bottom Column 3 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 => 'Main Template Content Bottom Column 4 Region',
            self::MAIN_TEMPLATE_FOOTER_TOP_AREA => 'Main Template Footer Top Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Main Template Footer Bottom Column 1 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'Main Template Footer Bottom Column 2 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'Main Template Footer Bottom Column 3 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'Main Template Footer Bottom Column 4 Region',
        );
        ////
        //
            //COLLEGE TEMPLATE REGIONS
        $regions2 = array(
            self::COLLEGE_TEMPLATE_HEADER_MAIN_MENU => 'College Template- Header Main Menu Region',
            //self::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'College Template - Home Page Slideshow Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'College Template - Home Page Slideshow Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT => 'College Template - Home Page Content Top Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_MIDDLE => 'College Template - Home Page Content Top Middle Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT => 'College Template - Home Page Content Top Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE_LEFT => 'College Template - Home Page Content Middle Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT => 'College Template - Home Page Content Middle Right Region',
            //self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_EVENTS_AREA => 'College Template - Home Page Content Events Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1 => 'College Template- Home Page Content Bottom Column1 Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2 => 'College Template- Home Page Content Bottom Column2 Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3 => 'College Template- Home Page Content Bottom Column3 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'College Template - Footer Column1 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'College Template - Footer Column2 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'College Template - Footer Column3 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'College Template - Footer Column4 Region',
        );

        if (\Yii::$app->session->has('UNIT_ID') && \Yii::$app->session->has('UNIT_ID') > 0) {
            return $regions2;
        } else {
            return array_merge($regions1, $regions2);
        }
    }

    /*
     * returnd the areas/regions where the menu can be placed in the home page of the main website
     */

    static function getMainHomeTemplateMenuRegions() {
        //MAIN TAMPLATE REGIONS
        $regions1 = array(
            //self::MAIN_TEMPLATE_HEADER_TOP_LEFT => 'Main Template Header Top Left Region',
            self::MAIN_TEMPLATE_HEADER_TOP_RIGHT => 'Main Template Header Top Right Region',
            //self::MAIN_TEMPLATE_HEADER_LOGO => 'Main Template Header  Logo Region',
            self::MAIN_TEMPLATE_HEADER_MAIN_MENU => 'Main Template Header-Main Menu Region',
            //self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT => 'Main Template Home SlideShow Left Region',
            self::MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'Main Template Home SlideShow Right Region',
            //self::MAIN_TEMPLATE_CONTENT_TOP_LEFT => 'Main Template Content Top Left Region',
            // self::MAIN_TEMPLATE_CONTENT_TOP_CENTRE => 'Main Template Content Top Centre Region',
            self::MAIN_TEMPLATE_CONTENT_TOP_RIGHT => 'Main Template Content Top Right Region',
            //self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA => 'Main Template Content News  Region',
            //self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT => 'Main Template Content Bottom Left Region',
            self::MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT => 'Main Template Content Bottom Right Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 => 'Main Template Content Bottom Column 1 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2 => 'Main Template Content Bottom Column 2 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3 => 'Main Template Content Bottom Column 3 Region',
            self::MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4 => 'Main Template Content Bottom Column 4 Region',
            // self::MAIN_TEMPLATE_FOOTER_TOP_AREA => 'Main Template Footer Top Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'Main Template Footer Bottom Column 1 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'Main Template Footer Bottom Column 2 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'Main Template Footer Bottom Column 3 Region',
            self::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'Main Template Footer Bottom Column 4 Region',
        );
        //COLLEGE TEMPLATE
        $regions2 = array(
            self::COLLEGE_TEMPLATE_HEADER_MAIN_MENU => 'College Template- Header Main Menu Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT => 'College Template - Home Page Slideshow Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_LEFT => 'College Template - Home Page Content Top Left Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_MIDDLE => 'College Template - Home Page Content Top Middle Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_TOP_RIGHT => 'College Template - Home Page Content Top Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_MIDDLE__RIGHT => 'College Template - Home Page Content Middle Right Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN1 => 'College Template- Home Page Content Bottom Column1 Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN2 => 'College Template- Home Page Content Bottom Column2 Region',
            self::COLLEGE_TEMPLATE_HOMEPAGE_CONTENT_BOTTOM_COLUMN3 => 'College Template- Home Page Content Bottom Column3 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1 => 'College Template - Footer Column1 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN2 => 'College Template - Footer Column2 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN3 => 'College Template - Footer Column3 Region',
            self::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN4 => 'College Template - Footer Column4 Region',
        );
        $regions3 = array(
            self::CUSTOM_PAGE_CONTENT_SIDE_MENU => 'Custom Page Side Menu Region',
        );

        if (\Yii::$app->session->has('UNIT_ID') && \Yii::$app->session->has('UNIT_ID') > 0) {
            return array_merge($regions2, $regions3);;
        } else {
            return array_merge($regions1, $regions2,$regions3);
        }
    }

    static function getCustomPageTemplateRegions() {
        return array(
            self::CUSTOM_PAGE_CONTENT_SIDE_MENU => 'Custom Page Side Menu Region',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN1 => 'Custom Page Content Top-Column1 Region',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN2 => 'Custom Page Content Top-Column2 Region',
            self::CUSTOM_PAGE_CONTENT_TOP_COLUMN3 => 'Custom Page Content Top-Column3 Region',
            self::CUSTOM_PAGE_CONTENT_TOP_LEFT => 'Custom Page Content Top-Left Region',
            self::CUSTOM_PAGE_CONTENT_TOP_RIGHT => 'Custom Page Content Top-Right Region',
            self::CUSTOM_PAGE_CONTENT_MIDDLE => 'Custom Page Content Middle  Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1 => 'Custom Page Content Bottom Column1 Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN2 => 'Custom Page Content Bottom Column2 Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN3 => 'Custom Page Content Bottom Column3 Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_LEFT => 'Custom Page Content Bottom Left Region',
            self::CUSTOM_PAGE_CONTENT_BOTTOM_RIGHT => 'Custom Page Content Bottom Right Region',
        );
    }

    static function getCustomBlockPlacmentregions() {
        $HomePageRegions = self::getMainHomeTemplateRegions();
        $CustomPageRegion = self::getCustomPageTemplateRegions();
        $CustomBlockRegions = array();
        return array_merge($HomePageRegions, $CustomPageRegion);
    }

}
