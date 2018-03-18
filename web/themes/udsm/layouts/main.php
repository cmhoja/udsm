<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use yii\debug\Toolbar;
use app\assets\LteAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<!-- saved from url=(0052)http://zozothemes.com/html/mist/light/header10.html# -->
<html lang="en">
    <head>
        <?= Html::csrfMetaTags() ?>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title><?php echo Yii::$app->name[Yii::$app->language] . '-' . $this->title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="<?php echo Html::encode($this->title); ?>">
        <meta name="description" content="<?php echo Html::encode($this->title); ?>">
        <meta name="author" content="<?php echo Html::encode($this->title); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="">
        <!-- Font -->
        <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/css">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/css(1)" rel="stylesheet" type="text/css">
        <!-- Font Awesome Icons -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Icomoon Icons -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/icons.css" rel="stylesheet">

        <!-- Animations -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/animate.min.css" rel="stylesheet">
        <!-- Owl Carousel Slider -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/owl.theme.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/owl.transitions.css" rel="stylesheet">
        <!-- PrettyPhoto Popup -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/prettyPhoto.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/style.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/responsive.css" rel="stylesheet">

        <!-- Flexslider -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/flexslider.css" rel="stylesheet">
        <!-- Color Scheme -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/color.css" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/icons/css/icons.min.css" />

        <!-- Main Stylesheet -->
        <!-- Perfect Scrollbar -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/perfect-scrollbar.css" />
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/common.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/util.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/stats.js"></script>

        <?php $this->head(); ?>
    </head>

    <body>
        <?php $this->beginBody(); ?>

        <div id="page">
            <!--NEW--> 
            <div>            </div>
            <!--END NEW-->
            <!--HEADER SECTION NEW ADDED-->
            <?php
            echo $this->render('main/main_header'); //loading the main template header top left
            ?>
            <!--END HEADER SECTION NEW ADDED-->

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
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/bootstrap.min.js"></script> 
            <!-- Menu jQuery plugin -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/hover-dropdown-menu.js"></script> 
            <!-- Menu jQuery Bootstrap Addon --> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.hover-dropdown-menu-addon.js"></script> 
            <!-- Scroll Top Menu -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.easing.1.3.js"></script> 
            <!-- Sticky Menu --> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.sticky.js"></script> 
            <!-- Bootstrap Validation -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/bootstrapValidator.min.js"></script> 
            <!-- Revolution Slider -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.themepunch.tools.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.themepunch.revolution.min.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/revolution-custom.js"></script> 
            <!-- Portfolio Filter -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.mixitup.min.js"></script> 
            <!-- Animations -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.appear.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/effect.js"></script> 
            <!-- Owl Carousel Slider -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/owl.carousel.min.js"></script> 
            <!-- Pretty Photo Popup -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.prettyPhoto.js"></script> 
            <!-- Parallax BG -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.parallax-1.1.3.js"></script> 
            <!-- Fun Factor / Counter -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.countTo.js"></script> 
            <!-- Twitter Feed -->

            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/carousel.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/scripts.js"></script> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/tweetie.min.js"></script> 
            <!-- Background Video -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.mb.YTPlayer.js"></script> 
            <!-- FlexSlider -->
            <script defer src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.flexslider.js"></script>

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
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/shCore.js"></script>
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/shBrushXml.js"></script>
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/shBrushJScript.js"></script>
            <!-- Custom Js Code -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/jquery.mousewheel.js"></script>
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/perfect-scrollbar.js"></script>

            <!-- CSS & JS SCRIPTS FOR YOUTUBE VIDEOPLAYER FOR HOME PAGE ONLY THIS IS AVAILABLE AT HOME PAGE ONLY-->
            <!-- JS Main For youtube player Javascript on home page-->           
            <?php if (isset($this->params['videos'])): ?>
                <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/layouts/main/css/youtube-video-player.min.css" />
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/youtube-video-player.jquery.min.js"></script>
                <?php
                $videos_list = NULL;
                if ($this->params['videos']) {
                    $videos_list = $this->params['videos'];
                }
                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $("#playlist").youtube_video({
                            playlist: false,
                            channel: false,
                            user: false,
                            videos: [<?php echo $videos_list; ?>],
                            shuffle: false,
                            max_results: 3,
                            pagination: true,
                            continuous: true,
                            first_video: 0,
                            show_playlist: 'auto',
                            playlist_type: 'vertical',
                            show_channel_in_playlist: true,
                            show_channel_in_title: true,
                            width: false,
                            show_annotations: false,
                            now_playing_text: '<?php echo Yii::$app->params['static_items']['video_now_playing'][Yii::$app->language]; ?>',
                            load_more_text: '<?php echo Yii::$app->params['static_items']['more_videos'][Yii::$app->language]; ?>',
                            autoplay: false,
                            force_hd: false,
                            hide_youtube_logo: true,
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
            <?php endif; ?>
            <!--END YOU TUBE PLAYER CSS--> 
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/custom.js"></script> 
            <!-- Scripts -->
            <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/main/js/js"></script>

            <?php $this->endBody(); ?>

    </body>
</html>
<?php $this->endPage(); ?>