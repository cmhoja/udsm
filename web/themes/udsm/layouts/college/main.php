<!DOCTYPE html>
<!-- saved from url=(0052)http://zozothemes.com/html/mist/light/header10.html# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title><?php echo Yii::$app->name[Yii::$app->language] . ' - ' . $this->params['unit_name'] . (($this->title) ? ' | ' . $this->title : ''); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="<?php echo $this->params['unit_name'] . ' - ' . Yii::$app->name[Yii::$app->language]; ?> ">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link rel="shortcut icon" href="">
        <!-- Font -->
        <link rel="stylesheet" href="<?php echo $this->theme->baseUrl; ?>/css">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/css(1)" rel="stylesheet" type="text/css">
        <!-- Font Awesome Icons -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/hover-dropdown-menu.css" rel="stylesheet">
        <!-- Icomoon Icons -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/icons.css" rel="stylesheet">

        <!-- Animations -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/animate.min.css" rel="stylesheet">
        <!-- Owl Carousel Slider -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/owl.theme.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/owl.transitions.css" rel="stylesheet">
        <!-- PrettyPhoto Popup -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/prettyPhoto.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/style.css" rel="stylesheet">
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/responsive.css" rel="stylesheet">

        <!-- Flexslider -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/flexslider.css" rel="stylesheet">
        <!-- Color Scheme -->
        <link href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/color.css" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/icons/css/icons.min.css" />

        <!-- Main Stylesheet -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/youtube-video-player.min.css" />
        <!-- Perfect Scrollbar -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->theme->baseUrl; ?>/layouts/college/css/perfect-scrollbar.css" />
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/common.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/util.js"></script>
        <script type="text/javascript" charset="UTF-8" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/stats.js"></script></head>
    <body>
        <div id="page">

            <header id="sticker">
                <!-- Top Bar -->
                <div id="top-bar sticker" class="top-bar-section top-bar-bg-light top-logo-left m-height text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <!-- Top Contact -->
                                <div  class="col-sm-2"style="z-index: 100;padding: 0.5%;margin-left: 0;margin-top: 0.5%;position: relative;float: left;display: block">
                                    <a style=""class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>">
                                        <img class="site_logo" style="width: 60px;" alt="Site Logo" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/logo.png" />
                                    </a>
                                </div>
                                <div class="col-sm-8" style="position: relative;float: left;">
                                    <div class="description-main" style="font-size: 19px;">
                                        <?php echo strtoupper($this->params['unit_name']); ?>
                                        <?php if ($this->params['unit_abbreviation_code']): ?>                                        
                                            <br/>(<?php echo strtoupper($this->params['unit_abbreviation_code']); ?>)
                                        <?php endif; ?>
                                    </div>
                                    <div class="top-description" style="font-size: 15px;font-weight: bold;clear: both"> 
                                        <?php echo strtoupper(Yii::$app->name[Yii::$app->language]); ?> 
                                    </div>
                                </div>
                                <?php if (isset($this->params['unit_logo']) && $this->params['unit_logo']) { ?>
                                    <div class="col-sm-2" style="z-index: 100;padding: 0.5%;margin-left: 0;margin-top: 0.5%;position: relative;float: left;display: block">
                                        <a style=""class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>">
                                            <img class="site_logo" style="width: 60px;" alt="Unit Logo" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $this->params['unit_logo']; ?>" />
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Bar -->



                <!-- Sticky Navbar -->
                <div id="sticker-sticky-wrapper" class="sticky-wrapper">
                    <div  class="sticky-navigation top-logo-left-header">
                        <!-- Sticky Menu -->
                        <div class="sticky-menu relative">
                            <!-- navbar -->
                            <div class="navbar navbar-default navbar-bg-color m-height" role="navigation">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="navbar-header">
                                                <!-- Button For Responsive toggle -->
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                    <span class="sr-only">Toggle navigation</span> 
                                                    <span class="icon-bar"></span> 
                                                    <span class="icon-bar"></span> 
                                                    <span class="icon-bar"></span>
                                                </button> 
                                                <!-- Logo -->
                                                <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>">
                                                    <img class="site_logo" alt="UDSM Official Logo" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/logo.png">
                                                </a>
                                                <?php //if (isset($this->params['unit_logo']) && $this->params['unit_logo']) { ?>
                                                <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>">
                                                    <img class="site-logo" alt="College Site Logo" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . $this->params['unit_logo']; ?>">
                                                </a>
                                                <?php //} ?>


                                            </div>
                                            <!-- Navbar Collapse -->
                                            <?php
                                            echo $this->render('main_menu'); //loading the main template header top left
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

                    <?php
                    echo $this->render('footer')
                    ?>
                    <!-- footer -->
                </div>
                <!-- page -->
                <!-- Scripts -->
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.min.js"></script> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/bootstrap.min.js"></script> 
                <!-- Menu jQuery plugin -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/hover-dropdown-menu.js"></script> 
                <!-- Menu jQuery Bootstrap Addon --> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.hover-dropdown-menu-addon.js"></script> 
                <!-- Scroll Top Menu -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.easing.1.3.js"></script> 
                <!-- Sticky Menu --> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.sticky.js"></script> 
                <!-- Bootstrap Validation -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/bootstrapValidator.min.js"></script> 
                <!-- Revolution Slider -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.themepunch.tools.min.js"></script> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.themepunch.revolution.min.js"></script> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/revolution-custom.js"></script> 
                <!-- Portfolio Filter -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.mixitup.min.js"></script> 
                <!-- Animations -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.appear.js"></script> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/effect.js"></script> 
                <!-- Owl Carousel Slider -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/owl.carousel.min.js"></script> 
                <!-- Pretty Photo Popup -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.prettyPhoto.js"></script> 
                <!-- Parallax BG -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.parallax-1.1.3.js"></script> 
                <!-- Fun Factor / Counter -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.countTo.js"></script> 
                <!-- Twitter Feed -->

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/carousel.js"></script> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/scripts.js"></script> 
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/tweetie.min.js"></script> 
                <!-- Background Video -->

                <!-- FlexSlider -->
                <script defer src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.flexslider.js"></script>

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
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/shCore.js"></script>
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/shBrushXml.js"></script>
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/shBrushJScript.js"></script>
                <!-- Custom Js Code -->
                <!-- Main For youtube player Javascript -->


                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/jquery.mousewheel.js"></script>
                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/perfect-scrollbar.js"></script>

                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/custom.js"></script> 
                <!-- Scripts -->


                <script type="text/javascript" src="<?php echo $this->theme->baseUrl; ?>/layouts/college/js/js"></script></body></html>