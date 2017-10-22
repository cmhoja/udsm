<?php
$this->title = 'Main Website Template Regions';
$this->params['breadcrumbs'][] = $this->title;
?>

<div style="position: relative;float: left;width: 100%;border: 1px solid black;overflow-y: scroll;height: 850px;">
    <div style="background: #FFFFFF;margin: 0.3%;position: relative;float: left;width: 99%; border: 1px solid black;font-size: 9px;font-weight: bold;">

        <div style="background: #225DCD;position: relative;float: left;width: 99%;margin: 0.3%;margin-bottom: 0.4%;margin-top: 0.4%; height: 30px;border: 1px solid black;color: wheat;">
            <div style="padding: 0.1%;position: relative;float: left;width: 30%;margin: 0.4%;border: 1px solid wheat;padding: 0.4%;">
                MAIN_TEMPLATE_HEADER_TOP_LEFT
            </div>
            <div style="padding: 0.1%;position: relative; float: right;width: 50%;margin: 0.4%;border: 1px solid wheat;padding: 0.4%;">
                MAIN_TEMPLATE_HEADER_TOP_RIGHT
            </div>
        </div>

        <div style="position: relative;float: left;width: 99.3%;margin: 0.3%;margin-bottom: 0.8%;margin-top: 0.8%;border: 1px solid black">
            <img style="text-align: center;position: relative;float:none;width: 5%;margin-left: 35%;vertical-align: middle;"class="site_logo" alt="UDSM Official Logo" src="<?php echo \yii\helpers\HtmlPurifier::process($this->theme->baseUrl . '/img/logo.png'); ?>">
            <span style="position: relative;float: none;text-align: center;vertical-align: middle;text-transform: uppercase;font-size: 14px;">
                <?php echo Yii::$app->name[Yii::$app->language]; ?>
            </span>
        </div>
        
        <div style="height: 20px;padding: 0.3%;background: rosybrown;width: 99.3%;margin: 0.3%;margin-bottom: 0;text-align: center;vertical-align: middle;position: relative;float: left;border: 1px solid black">
            MAIN_TEMPLATE_HEADER_MAIN_MENU ( FIXED FOR MAIN MENU )
        </div>

        <div style="position: relative;float: left;width: 99.3%;margin: 0.3%;margin-bottom: 0.8%;margin-top: 0.8%;border: 1px solid black">
            <div style="background: rosybrown;position: relative;float: left;width: 68.4%;padding: 3%;height: 250px;margin: 0.4%;border: 1px solid black;">
                MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_LEFT (FIXED FOR SLIDE SHOWS)
            </div>
            <div style="position: relative; float: right;width: 30%;height: 250px;margin: 0.4%;border: 1px solid black;">
                <div style="background: rosybrown;width: 99%;margin: 0.4%;height: 140px;padding: 3%;border: 1px solid black;">
                    MAIN_TEMPLATE_SEARCH_FORM_REGION  (FIXED)
                </div>
                <div style="font-size: 9px;width: 99%;margin: 0.4%;height: 103px;border: 1px solid black;padding: 4%">
                    MAIN_TEMPLATE_HOMEPAGE_SLIDESSHOW_RIGHT
                </div>
            </div>
        </div>

        <div style="position: relative;float: left;width: 99.3%;margin: 0.3%;margin-bottom: 0.8%;margin-top: 0.8%;border: 1px solid black">
            <div style="position: relative;float: left;width: 38%;padding: 3%;height: 100px;margin: 0.4%;border: 1px solid black;">
                MAIN_TEMPLATE_CONTENT_TOP_LEFT
            </div>
            <div style="position: relative; float: right;width: 60%;margin: 0.4%;">
                <div style="position: relative; float: left;width: 54%;height: 100px;padding: 3%;border: 1px solid black;">
                    MAIN_TEMPLATE_CONTENT_TOP_CENTRE
                </div>
                <div style="position: relative; float: left;margin-left: 1.5%;width: 44%;height: 100px;border: 1px solid black;padding: 4%">
                    MAIN_TEMPLATE_CONTENT_TOP_RIGHT
                </div>
            </div>
        </div>


        <div style="width: 99.3%;margin: 0.3%;background: rosybrown;text-align: center;vertical-align: middle;padding: 2%;position: relative;float: left;height: 60px;border: 1px solid black">
            MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA (FIXED FOR NEWS)
        </div>

        <div style="position: relative;float: left;width: 99.3%;margin: 0.3%;margin-bottom: 0.8%;margin-top: 0.8%;border: 1px solid black">
            <div style="background: rosybrown;position: relative;float: left;width: 69%;padding: 3%;height: 100px;margin: 0.4%;border: 1px solid black;">
                MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_LEFT  (FIXED FOR VIDEOS)
            </div>
            <div style="position: relative; font-size: 9px;padding-top: 3%;float: right;width: 29.4%;height: 100px;margin: 0.4%;border: 1px solid black;">
                MAIN_TEMPLATE_CONTENT_HOMEPAGE_BOTTOM_RIGHT
            </div>
        </div>


        <div style="position: relative;float: left;width: 99.3%;margin: 0.3%;margin-bottom: 0.8%;margin-top: 0.8%;border: 1px solid black">
            <div style="position: relative; float: left;width: 50%;;border: 1px solid black;">
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;padding: 3%;border: 1px solid black;">
                    MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN1 
                </div>
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;border: 1px solid black;padding: 4%">
                    MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN2
                </div>
            </div>
            <div style="position: relative; float: right;width: 50%;;border: 1px solid black;">
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;padding: 3%;border: 1px solid black;">
                    MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN3
                </div>
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;border: 1px solid black;padding: 4%">
                    MAIN_TEMPLATE_CONTENT_BOTTOM_COLUMN4
                </div>
            </div>
        </div>

        <div style=";text-align: center;vertical-align: middle;padding: 2%;position: relative;float: left;width: 99.3%;margin: 0.3%;height: 60px;border: 1px solid black">
            MAIN_TEMPLATE_FOOTER_TOP_AREA
        </div>


        <div style="position: relative;float: left;width: 99.3%;margin: 0.3%;margin-bottom: 0.8%;margin-top: 0.8%;border: 1px solid black">
            <div style="position: relative; float: left;width: 50%;;border: 1px solid black;">
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;padding: 3%;border: 1px solid black;">
                    MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1 
                </div>
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;border: 1px solid black;padding: 4%">
                    MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2
                </div>
            </div>
            <div style="position: relative; float: right;width: 50%;;border: 1px solid black;">
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;padding: 3%;border: 1px solid black;">
                    MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN3
                </div>
                <div style="position: relative; float: left;width: 49%;margin: 0.4%;height: 100px;border: 1px solid black;padding: 4%">
                    MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4
                </div>
            </div>
        </div>

        <div style="background: #0B1E42;color: white;text-align: center;vertical-align: middle;padding: 2%;position: relative;float: left;height: 60px;width: 99.3%;margin: 0.3%;border: 1px solid black;margin-bottom: 1%;">
            &copy; 2017 University of Dar es salaam <br/>
            Term of use / Privacy Policy
        </div>

    </div>
</div>