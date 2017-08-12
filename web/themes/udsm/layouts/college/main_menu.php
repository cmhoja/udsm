<!--
This File control display of the Main menu of the UDSM Colleges/Units/Schools  website
It has all the view logic to show dynamic menus from the Cms as managed by the College Admins website Content managers
-->
<div class="navbar-collapse collapse">
    <?php
    $UnitID = $this->params['unit_id'];
    //echo $UnitID;
    $college_main_menus = app\models\Menu::getActiveMenuByMenuTypeRegionAndTemplateByUnitID(\app\models\Menu::MENU_TYPE_MAIN_MENU, app\components\SiteRegions::COLLEGE_TEMPLATE_HEADER_MAIN_MENU, $UnitID);
    //var_dump($college_main_menus);
    ?>
    <?php
    if ($college_main_menus) {
        foreach ($college_main_menus as $key => $menu) {
            ?>
            <!-- nav -->
            <ul class="nav navbar-nav sm" >
                <?php
                //menus items
                //getting active parrent menus items
                $parent_menu_items = app\models\MenuItem::getActiveParentMenuItemsByMenuId($menu->Id);
                if ($parent_menu_items) {
                    foreach ($parent_menu_items as $key => $menu_item) {

                        //getting submenu level1
                        $submenus_level1 = app\models\MenuItem::getSubmenusByMenuItemId($menu_item->Id);
                        $class = NULL;
                        if ($submenus_level1 && count($submenus_level1)) {
                            ?>
                            <li class="mega-menu">
                                <a href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($menu_item->LinkUrl)); ?>">
                                    <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $menu_item->ItemNameSw : $menu_item->ItemNameEn); ?><span class="sub-arrow"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <?php
                                            foreach ($submenus_level1 as $submenus_level1) {
                                                //checking submenu level2 
                                                $submenus_level2 = app\models\MenuItem::getSubmenusByMenuItemId($submenus_level1->Id);
                                                if ($submenus_level2) {
                                                    ?>
                                                    <div class="col-md-15 col-sm-3">
                                                        <a href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($submenus_level1->LinkUrl)); ?>">
                                                            <h6 class="title"> <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $submenus_level1->ItemNameSw : $submenus_level1->ItemNameEn); ?></h6>
                                                        </a>
                                                        <div class="page-links">
                                                            <?php
                                                            foreach ($submenus_level2 as $submenu_level2) {
                                                                ?>
                                                                <div>
                                                                    <a href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($submenu_level2->LinkUrl)); ?>">
                                                                        <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $submenu_level2->ItemNameSw : $submenu_level2->ItemNameEn); ?>
                                                                    </a>
                                                                </div>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-sm-3">
                                                        <a href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($submenus_level1->LinkUrl)); ?>">
                                                            <h6 class="title"> <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $submenus_level1->ItemNameSw : $submenus_level1->ItemNameEn); ?></h6>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($menu_item->LinkUrl)); ?>">
                                    <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $menu_item->ItemNameSw : $menu_item->ItemNameEn); ?><span class="sub-arrow"></span>
                                </a>
                            </li>
                            <?php
                        }
                    }
                }
                ?>

                <!-- Search Box Block -->
                <li class="search-dropdown">
                    <a href="#">
                        <span class="searchbox-icon">
                            <i class="fa fa-search"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu left">
                        <li>
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" value="" name="s" id="s" class="form-control" placeholder="search" />
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- Ends Search Box Block -->

                <li class="top-parent language-dropdown">
                    <a href="#" class="has-submenu"><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/uk.png"> ENG</a><span class="sub-arrow">...</span></a>
                    <ul class="dropdown-menu right sm-nowrap" style="width: auto; display: none; top: auto; left: 0px; margin-left: 0px; margin-top: 0px; min-width: 200px; max-width: 400px;">

                        <li>
                            <a href="#">
                                <img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/tz.png"> SWA</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <?php
        }
    }
    ?>

</div>