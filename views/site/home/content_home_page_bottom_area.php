
<?php if (isset($content_home_page_bottom_area_menu) OR isset($videos)): ?>
    <section class="page-section promotion light-bg border-tb" >
        <div class="container who-we-are">
            <div class="row">
                <div class="col-md-9">
                    <?php if (isset($videos) && $videos) { ?>
                        <div class="section-title">
                            <!-- Heading -->
                            <h3 class="title"><i class="fa fa-television"></i> <?php echo Yii::$app->params['static_items']['videos'][Yii::$app->language]; ?></h3>
                        </div>
                        <div id="playlist"></div>
                    <?php } ?>
                </div>
                <div class="col-md-3">
                    <?php if (isset($content_home_page_bottom_area_menu) && $content_home_page_bottom_area_menu) { ?>
                        <div class="section-title">
                            <!-- Heading -->
                            <h3 class="title"><i class="fa fa-binoculars"></i> <?php echo Yii::$app->params['static_items']['campus_life'][Yii::$app->language]; ?></h3>
                        </div>
                        <ul class="features-list features-list-left">
                            <?php
                            //var_dump($content_home_page_bottom_area_menu);
                            foreach ($content_home_page_bottom_area_menu as $menu) {
                                ?>
                                <li class="features-list-item">
                                    <!-- Icon -->
                                    <a href="<?php echo \app\components\Utilities::generateUrl($menu->LinkUrl); ?>">
                                        <i class="fa <?php echo $menu->menuClasses; ?> fa-2x border-blue"></i>
                                        <div class="features-content">
                                            <!-- Title -->
                                            <h5><?php echo (Yii::$app->language == 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn; ?></h5>
                                        </div>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                          
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>