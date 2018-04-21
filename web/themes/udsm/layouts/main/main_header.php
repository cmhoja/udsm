<div id="logos" class="main-header" style="height: 11.64em">
    <div class="row">
        <div class="container">
            <div class="col-md-6 no-pad">
                <div class="col-md-12">
                    <div id="top-bar" class="top-bar-section top-bar-bg-color">
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="<?php echo Yii::$app->homeUrl; ?>">
                        <img  class="site_logo" alt="UDSM Official Logo" src="<?php echo \yii\helpers\HtmlPurifier::process($this->theme->baseUrl).'/layouts/main/img/logo_ud.png'; ?>">
                    </a>
                </div>
                <div class="col-md-9 uni-heading">
                    <span style="font-size:1.9em"><strong><?php echo strtoupper(Yii::$app->name[Yii::$app->language]); ?></strong></span>
                </div>

            </div>
            <div class="col-md-6 no-pad">
                <div class="top-social-icon link-hover-black">
                    <?php
                    echo $this->render('main_template_header_top_right'); //loading the main template header top left
                    ?>
                </div> 
                <img style="float: right; max-height: 130px;" src="<?php echo \yii\helpers\HtmlPurifier::process($this->theme->baseUrl).'/layouts/main/img/nkr.png'; ?>">

            </div>


        </div>
    </div>
</div>

<div id="sticker-sticky-wrapper" class="sticky-wrapper " style="height: 79px;">
    <header id="sticker" class="sticky-navigation center-menu-header">
        <!-- Sticky Menu -->
        <div class="sticky-menu relative sticky-background">
            <!-- navbar -->
            <div class="navbar navbar-default navbar-bg-light" role="navigation">
                <div class="container ">
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
                            </div>
                            <!-- Navbar Collapse -->
                            <?php
                            echo $this->render('main_menu'); //loading the main menu from the main template
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
<!-- Search Form -->
<div id="search"> 
    <span class="close">X</span>
    <form role="search" id="searchform" action="/search" method="get">
        <input value="" name="q" type="search" placeholder="type to search"/>

    </form>
</div>