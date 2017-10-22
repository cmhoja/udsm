<?php
$UnitID = $this->params['unit_id'];
?>
<footer id="footer">
    <div class="footer-widget dark-section">
        <div class="container">
            <div class="row">
                <!--FOOTER COLUMN1-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">

                    <!--geting blocks allocated at this region--> 
                    <?php
                    $blocks = app\models\CustomBlocks::getActiveBlocksByRegionId(app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1, app\models\CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $UnitID);

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
                    $footer_column1_menus = app\models\Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1, $UnitID, '*');
                    if ($footer_column1_menus) {
                        foreach ($footer_column1_menus as $menu_group) {
                            $menus = app\models\MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, app\models\MenuItem::STATUS_ENABLED);
                            //////////////
                            ?>
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? $menu_group->DisplayNameSw : $menu_group->DisplayNameEn ?></h3>
                            </div>
                            <?php
                            // $menus = \app\models\MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(\app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1, $UnitID, '*');
                            if ($menus) {
                                ?> 
                                <nav>
                                    <ul>
                                        <?php
                                        foreach ($menus as $menuitem) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $menuitem->LinkUrl; ?>"><?php echo (Yii::$app->language == 'sw') ? $menuitem->ItemNameSw : $menuitem->ItemNameEn ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </nav>
                                <?php
                            }
                        }
                    }
                    ?>


                </div>

                <!--FOOTER COLUMN2-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">

                    <!--geting blocks allocated at this region--> 
                    <?php
                    $blocks = app\models\CustomBlocks::getActiveBlocksByRegionId(app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN2, app\models\CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $UnitID);
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
                    $footer_column2_menus = app\models\Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN2, $UnitID, '*');
                    if ($footer_column2_menus) {
                        foreach ($footer_column2_menus as $menu_group) {
                            $menus = app\models\MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, app\models\MenuItem::STATUS_ENABLED);
                            //////////////
                            ?>
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? $menu_group->DisplayNameSw : $menu_group->DisplayNameEn ?></h3>
                            </div>
                            <?php
                            // $menus = \app\models\MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(\app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN1, $UnitID, '*');
                            if ($menus) {
                                ?> 
                                <nav>
                                    <ul>
                                        <?php
                                        foreach ($menus as $menuitem) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $menuitem->LinkUrl; ?>"><?php echo (Yii::$app->language == 'sw') ? $menuitem->ItemNameSw : $menuitem->ItemNameEn ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </nav>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>

                <!--FOOTER COLUMN 3-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">
                    <!--geting blocks allocated at this region--> 
                    <?php
                    $blocks = app\models\CustomBlocks::getActiveBlocksByRegionId(app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN3, app\models\CustomBlocks::BLOCK_TYPE_HOME_PAGE, 0, $UnitID);
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
                    $footer_column3_menus = app\models\Menu::getActiveMenuGroupDetailsByMenuTypeRegionAndUnitID(app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::COLLEGE_TEMPLATE_FOOTER_BOTTOM_COLUMN3, $UnitID, '*');
                    if ($footer_column3_menus) {
                        foreach ($footer_column3_menus as $menu_group) {
                            $menus = app\models\MenuItem::getMenuItemsByMenuGroupIDAndStatus($menu_group->Id, app\models\MenuItem::STATUS_ENABLED);
                            //////////////
                            ?>
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title"><?php echo (Yii::$app->language == 'sw') ? $menu_group->DisplayNameSw : $menu_group->DisplayNameEn ?></h3>
                            </div>
                            <?php
                            if ($menus) {
                                ?> 
                                <nav>
                                    <ul>
                                        <?php
                                        foreach ($menus as $menuitem) {
                                            ?>
                                            <li>
                                                <a href="<?php echo $menuitem->LinkUrl; ?>"><?php echo (Yii::$app->language == 'sw') ? $menuitem->ItemNameSw : $menuitem->ItemNameEn ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                </nav>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>


                <!--FOOTER COLUMN 4-->
                <div class="col-xs-12 col-sm-6 col-md-3 widget newsletter bottom-xs-pad-20">
                    <div class="widget-title">
                        <!-- Title -->
                        <h3 class="title"><?php echo Yii::$app->params['static_items']['contact_us'][Yii::$app->language] ?></h3>
                    </div>
                    <?php
                    $contacts = app\models\Contacts::getActiveUnitsContacts($UnitID);
                    if (!$contacts) {
                        //geting the main UDSM contacts if no unit contacts set
                        // $contacts = app\models\Contacts::getActiveUnitsContacts(NULL);
                    }
                    if ($contacts) {
                        ?>
                        <?php if ($contacts->StreetRegion OR $contacts->PoBox) { ?>
                            <p>
                                <strong><?php echo Yii::$app->params['static_items']['postal_address'][Yii::$app->language]; ?></strong> 
                                <br><?php echo $contacts->PoBox; ?>
                                <br><?php echo $contacts->StreetRegion; ?>
                            </p>
                        <?php } ?>
                        <!-- Phone -->
                        <?php if ($contacts->PhoneNo) { ?>
                            <p>
                                <strong><?php echo Yii::$app->params['static_items']['call_us'][Yii::$app->language]; ?>:</strong>
                                <?php echo str_ireplace(',', '<br/>', $contacts->PhoneNo); ?>
                            </p>
                        <?php } ?>

                        <?php if ($contacts->FaxNo) { ?>
                            <p>
                                <strong><?php echo Yii::$app->params['static_items']['Fax'][Yii::$app->language]; ?>:</strong>
                                <?php echo str_ireplace(',', '<br/>', $contacts->FaxNo); ?>
                            </p>
                        <?php } ?>
                        <?php if ($contacts->EmailAddress) { ?>
                            <p>
                                <strong><?php echo Yii::$app->params['static_items']['email'][Yii::$app->language]; ?>:</strong>
                                <?php echo $contacts->EmailAddress; ?>
                            </p>
                        <?php } ?>
                        <?php
                    }
                    ?>

                    <!-- Social Links -->
                    <div class="social-icon gray-bg icons-circle i-3x">
                        <!--Getting social network accounts-->
                        <?php
                        $social_accounts = app\models\SocialMediaAccounts::getActiveAccountsByUnitID($UnitID);
                        if (!$social_accounts) {
                            //getting MAin udsm soial media
                            $social_accounts = app\models\SocialMediaAccounts::getActiveAccountsByUnitID(NULL);
                        }
                        if ($social_accounts) {

                            foreach ($social_accounts as $social_account) {
                                ?>
                                <a target="_blank" href="<?php echo yii\helpers\Url::to(html_entity_decode($social_account->AccountAddress)) ?>" >
                                    <i class = "<?php echo $social_account->AccountLogoClass; ?>"> </i>

                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- .newsletter -->
            </div>
        </div>
    </div>
    <!-- footer-top -->

    <!-- footer-top -->
    <div class="copyright dark-section">
        <div class="container">
            <div class="row">
                <!-- Copyrights -->
                <div class="col-xs-10 col-sm-6 col-md-6"><i class="fa fa-copyright"></i>
                    <?php echo Date('Y', time()); ?> 
                    <a href="<?php echo Yii::$app->homeUrl; ?>">
                        <?php echo Yii::$app->name[Yii::$app->language] . '&nbsp;-&nbsp;' . Yii::$app->session->get('UNIT_COLLEGE_NAME'); ?>
                    </a>
                    <br>
                    <!-- Terms Link -->

                    <a href="#"><?php echo Yii::$app->params['static_items']['term_of_use'][Yii::$app->language]; ?></a> / 
                    <a href="#"><?php echo Yii::$app->params['static_items']['privacy_policy'][Yii::$app->language]; ?></a></div>
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