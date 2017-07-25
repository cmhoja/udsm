<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;

// You can use the registerAssetBundle function if you'd like
//$this->registerAssetBundle('app');
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<!-- saved from url=(0052)http://zozothemes.com/html/mist/light/header10.html# -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>University of Dar Es Salaam</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="<?php echo Html::encode($this->title); ?>">
        <meta name="description" content="<?php echo Html::encode($this->title); ?>">
        <meta name="author" content="<?php echo Html::encode($this->title); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="">
        <!-- Font -->
        <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/css">
        <link href="<?php echo $this->theme->baseUrl; ?>/css/css(1)" rel="stylesheet" type="text/css">
        <!-- Font Awesome Icons -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Icomoon Icons -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/icons.css" rel="stylesheet">

        <!-- Animations -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/animate.min.css" rel="stylesheet">
        <!-- Owl Carousel Slider -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/css/owl.theme.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/css/owl.transitions.css" rel="stylesheet">
        <!-- PrettyPhoto Popup -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/prettyPhoto.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/style.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/css/responsive.css" rel="stylesheet">

        <!-- Flexslider -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/flexslider.css" rel="stylesheet">
        <!-- Color Scheme -->
        <link href="<?php echo $this->theme->baseUrl; ?>/css/color.css" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/css/icons/css/icons.min.css" />

        <!-- Main Stylesheet -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/css/youtube-video-player.min.css" />
        <!-- Perfect Scrollbar -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/css/perfect-scrollbar.css" />
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/js/common.js"></script><script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/util.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/js/stats.js"></script>
        <?php $this->head(); ?>
    </head>

    <body>
        <?php $this->beginBody(); ?>

        <div id="page">
            <div id="top-bar" class="top-bar-section top-bar-bg-color">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Top Contact -->
                            <div class="top-contact link-hover-black">
                                <?php
                                //loading social network accounts for main site
                                echo $this->render('main/main_template_header_top_left'); //loading the main template header top left
                                ?>
                            </div>

                            <!-- Top Social Icon -->
                            <div class="top-social-icon link-hover-black">
                                <?php
                                echo $this->render('main/main_template_header_top_right'); //loading the main template header top left
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar -->
            <!-- Sticky Navbar -->
            <div id="sticker-sticky-wrapper" class="sticky-wrapper" style="height: 79px;">
                <header id="sticker" class="sticky-navigation center-menu-header">
                    <!-- Sticky Menu -->
                    <div class="sticky-menu relative">
                        <!-- navbar -->
                        <div class="navbar navbar-default navbar-bg-light" role="navigation">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="navbar-header">
                                            <!-- Button For Responsive toggle -->
                                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                <span class="sr-only">Toggle navigation</span> 
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span></button> 
                                            <!-- Logo -->
                                            <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>">
                                                <img class="site_logo" alt="Site Logo" src="<?php echo $this->theme->baseUrl; ?>/img/logo.png">
                                                <span><?php echo Yii::$app->name[Yii::$app->language]; ?></span>
                                            </a>
                                        </div>
                                        <!-- Navbar Collapse -->
                                        <?php
                                        echo $this->render('main/main_menu'); //loading the main menu from the main template
                                        ?>
                                        <!-- /.navbar-collapse -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                        </div>
                        <!-- navbar -->
                    </div>
                    <!-- Sticky Menu -->
                </header>
            </div>


            <!--DYNAMIC CONTENT AREA-->
            <?php echo $content; ?>
            <!--END DYNAMIC CONTENT AREA-->

            <!-- MAIN SITE FOOTER STARTS HERE--> 
            <?php
            echo $this->render('main/footer')
            ?>
            <!-- END MAIN SITE FOOTER-->

            <!--</div>-->
            <!-- page -->
            <!-- Scripts -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/bootstrap.min.js"></script> 
            <!-- Menu jQuery plugin -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/hover-dropdown-menu.js"></script> 
            <!-- Menu jQuery Bootstrap Addon --> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.hover-dropdown-menu-addon.js"></script> 
            <!-- Scroll Top Menu -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script> 
            <!-- Sticky Menu --> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.sticky.js"></script> 
            <!-- Bootstrap Validation -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/bootstrapValidator.min.js"></script> 
            <!-- Revolution Slider -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.themepunch.tools.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.themepunch.revolution.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/revolution-custom.js"></script> 
            <!-- Portfolio Filter -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.mixitup.min.js"></script> 
            <!-- Animations -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.appear.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/effect.js"></script> 
            <!-- Owl Carousel Slider -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/owl.carousel.min.js"></script> 
            <!-- Pretty Photo Popup -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.prettyPhoto.js"></script> 
            <!-- Parallax BG -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.parallax-1.1.3.js"></script> 
            <!-- Fun Factor / Counter -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.countTo.js"></script> 
            <!-- Twitter Feed -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/carousel.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/scripts.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/tweetie.min.js"></script> 
            <!-- Background Video -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.mb.YTPlayer.js"></script> 
            <!-- FlexSlider -->
            <script defer src="<?php echo $this->theme->baseUrl; ?>/js/jquery.flexslider.js"></script>

            <script type="text/javascript">
                $(function () {
                    SyntaxHighlighter.all();
                });
                $(window).load(function () {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function (slider) {
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>

            <!-- Syntax Highlighter -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/shCore.js"></script>
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/shBrushXml.js"></script>
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/shBrushJScript.js"></script>
            <!-- Custom Js Code -->
            <!-- Main For youtube player Javascript -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/youtube-video-player.jquery.min.js"></script>


            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/jquery.mousewheel.js"></script>
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/perfect-scrollbar.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#playlist").youtube_video({
                        playlist: 'PLncTFGctaqZupp4iNer4nKBqXCrhcszvC',
                        channel: false,
                        user: false,
                        videos: false,
                        shuffle: false,
                        max_results: 50,
                        pagination: true,
                        continuous: true,
                        first_video: 0,
                        show_playlist: 'auto',
                        playlist_type: 'vertical',
                        show_channel_in_playlist: true,
                        show_channel_in_title: true,
                        width: false,
                        show_annotations: false,
                        now_playing_text: 'Now Playing',
                        load_more_text: 'Load More',
                        autoplay: false,
                        force_hd: false,
                        hide_youtube_logo: false,
                        play_control: true,
                        time_indicator: 'full',
                        volume_control: true,
                        share_control: true,
                        fwd_bck_control: true,
                        youtube_link_control: true,
                        fullscreen_control: true,
                        playlist_toggle_control: true,
                        volume: false,
                        show_controls_on_load: true,
                        show_controls_on_pause: true,
                        show_controls_on_play: false,
                        player_vars: {},
                        colors: {},

                        on_load: function (snippet) {
                            set_log('loaded', snippet)
                        },
                        on_done_loading: function (videos) {
                            set_log('videos', videos)
                        },
                        on_state_change: function (state) {
                            set_log('state', state)
                        },
                        on_seek: function (seconds) {
                            set_log('seek', seconds)
                        },
                        on_volume: function (volume) {
                            set_log('volume', volume)
                        },
                        on_time_update: function (seconds) {
                            set_log('time', seconds)
                        },

                    });
                });

                function set_log(title, val) {
                    $(".log").html('<div><span>' + title + '</span>' + val + '</div>' + $(".log").html());
                }

            </script>

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/custom.js"></script> 
            <!-- Scripts -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/js/js"></script>

            <?php $this->endBody(); ?>

    </body>
</html>
<?php $this->endPage(); ?>