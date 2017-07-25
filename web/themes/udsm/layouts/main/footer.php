<footer id="footer">
    <div class="footer-widget dark-section">
        <div class="container">
            <div class="row">
                <!--FOOTER COLUMN 1-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                    <!--geting blocks allocated at this region--> 
                    <?php
                    $blocks = app\models\CustomBlocks::getActiveBlocksByRegionId(app\components\SiteRegions::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1, app\models\CustomBlocks::BLOCK_TYPE_HOME_PAGE,NULL);
                    if ($blocks) {
                        foreach ($blocks as $block) {
                            ?>
                            <div class="widget-title">
                                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn ?></h3>
                            </div>
                            <p style="text-align: justify"><?php echo (Yii::$app->language == 'sw') ? $block->BlockDetailsSw : $block->BlockDetailsEn; ?></p>
                            <?php
                        }
                    }
                    ?>

                    <!--Getting Menus if any-->
                    <?php
                    $menus = \app\models\Menu::getActivemenuByRegionMenuTypePageType(app\components\SiteRegions::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN1, \app\models\Menu::MENU_TYPE_OTHER_MENU, 0);
                    if ($menus) {
                        foreach ($menus as $menu) {
                            ?>
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title"><?php //echo (Yii::$app->language == 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn                        ?></h3>
                            </div>
                            <nav>
                                <ul>
                                    <?php
                                    $menuitems = \app\models\MenuItem::getSubmenusByMenuId($menu->Id);
                                    if ($menuitems) {
                                        foreach ($menuitems as $menuitem) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $menuitem->LinkUrl; ?>"><?php echo (Yii::$app->language == 'sw') ? $menuitem->ItemNameSw : $menuitem->ItemNameEn ?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </nav>
                            <?php
                        }
                    }
                    ?>

                </div>

                <!--FOOTER COLUMN 2-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">

                    <!--LOADING MENU ALLOCATED THIS REGION-->
                    <?php
                    $menus = \app\models\Menu::getActivemenuByRegionMenuTypePageType(app\components\SiteRegions::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2, \app\models\Menu::MENU_TYPE_OTHER_MENU, 0);
                    if ($menus) {
                        foreach ($menus as $menu) {
                            ?>
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title">Quick Links</h3>
                                <!--<h3 class="title"><?php //echo (Yii::$app->language == 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn                        ?></h3>-->
                            </div>
                            <nav>
                                <ul>
                                    <?php
                                    $menuitems = \app\models\MenuItem::getSubmenusByMenuId($menu->Id);
                                    if ($menuitems) {
                                        foreach ($menuitems as $menuitem) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $menuitem->LinkUrl; ?>"><?php echo (Yii::$app->language == 'sw') ? $menuitem->ItemNameSw : $menuitem->ItemNameEn ?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </nav>
                            <?php
                        }
                    }
                    ?>
                    <!--SHOWING ANY BLOCKS ALLOCATED HERE-->
                    <!--getting blocks allocated at this region--> 
                    <?php
                    $blocks2 = app\models\CustomBlocks::getActiveBlocksByRegionId(app\components\SiteRegions::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN2, app\models\CustomBlocks::BLOCK_TYPE_HOME_PAGE);
                    if ($blocks) {
                        foreach ($blocks2 as $block2) {
                            ?>
                            <div class="widget-title">
                                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? $block2->BlockTitleSw : $block2->BlockTitleEn ?></h3>
                            </div>
                            <p style="text-align: justify"><?php echo (Yii::$app->language == 'sw') ? $block2->BlockDetailsSw : $block2->BlockDetailsEn; ?></p>
                            <?php
                        }
                    }
                    ?>

                </div>

                <!--FOOTER COLUMN 3-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget">
                    <!--Getting social network accounts-->
                    <?php
                    $social_accounts = app\models\SocialMediaAccounts::getActiveAccountsByUnitID();
                    if ($social_accounts) {
                        ?>
                        <div class = "widget-title">
                            <!--Title -->
                            <h3 class = "title">Social Media</h3>
                        </div>
                        <?php
                        foreach ($social_accounts as $social_account) {
                            ?>
                            <div class = "social-icon gray-bg icons-circle i-3x">
                                <a target="_blank" href="<?php echo yii\helpers\Url::to(html_entity_decode($social_account->AccountAddress)) ?>" >
                                    <i class = "<?php echo $social_account->AccountLogoClass; ?>"> </i>
                                    <?php echo $social_account->AccountName; ?>
                                </a>
                            </div>
                            
                            <?php
                        }
                    }
                    ?>

                </div>

                <!--FOOTER COLUMN 4 -->
                <div class = "col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20">
                    <?php
                    $blocks3 = app\models\CustomBlocks::getActiveBlocksByRegionId(app\components\SiteRegions::MAIN_TEMPLATE_FOOTER_BOTTOM_COLUMN4, app\models\CustomBlocks::BLOCK_TYPE_HOME_PAGE);
                    if ($blocks3) {
                        foreach ($blocks3 as $block3) {
                            ?>
                            <div class="widget-title">
                                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? $block3->BlockTitleSw : $block3->BlockTitleEn ?></h3>
                            </div>
                            <p style="text-align: justify"><?php echo (Yii::$app->language == 'sw') ? $block3->BlockDetailsSw : $block3->BlockDetailsEn; ?></p>
                            <?php
                        }
                    }
                    ?>

                </div>
                <!--.newsletter -->
            </div>
        </div>
    </div>
    <!--footer-top -->
    <div class = "copyright dark-section">
        <div class = "container">
            <div class = "row">
                <!--Copyrights -->
                <div class = "col-xs-10 col-sm-6 col-md-6"><i class = "fa fa-copyright"></i> <?php echo Date('Y', time());
                    ?> <a href="<?php echo Yii::$app->homeUrl; ?>"><?php echo Yii::$app->name[Yii::$app->language]; ?></a>
                    <br>
                    <!-- Terms Link -->
                    <a href="#">Terms of Use</a> / 
                    <a href="#">Privacy Policy</a></div>
                <div class="col-xs-2 col-sm-6 col-md-6 text-right page-scroll icons-circle i-3x">
                    <!-- Goto Top -->
                    <a href="#page">
                        <i class="fa fa-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom -->
</footer>