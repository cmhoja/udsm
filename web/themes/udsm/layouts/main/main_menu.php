<!--
This File control display of the Main menu of the UDSM main website
It has all the view logic to show dynamic menus from the Cms as managed by the Main website Content managers
-->


<div class="navbar-collapse collapse">
    <?php
    //getting the menus allocated in thie area
    $available_menus = app\models\Menu::getActiveMenuByMenuTypeRegionAndTemplateByUnitID(\app\models\Menu::MENU_TYPE_MAIN_MENU, app\components\SiteRegions::MAIN_TEMPLATE_HEADER_MAIN_MENU);

    if ($available_menus) {
        foreach ($available_menus as $key => $menu) {
            ?>
            <!-- nav -->
            <ul class="nav navbar-nav sm">
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
                                <a target="<?php echo $menu_item->UrlType == app\models\MenuItem::URL_TYPE_EXTERNAL ? '_blank' : ''; ?>" href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($menu_item->LinkUrl)); ?>">
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
                                                        <a target="<?php echo $submenus_level1->UrlType == app\models\MenuItem::URL_TYPE_EXTERNAL ? '_blank' : ''; ?>" href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($submenus_level1->LinkUrl)); ?>">
                                                            <h6 class="title"> <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $submenus_level1->ItemNameSw : $submenus_level1->ItemNameEn); ?></h6>
                                                        </a>
                                                        <div class="page-links">
                                                            <?php
                                                            foreach ($submenus_level2 as $submenu_level2) {
                                                                ?>
                                                                <div>
                                                                    <a target="<?php echo $submenu_level2->UrlType == app\models\MenuItem::URL_TYPE_EXTERNAL ? '_blank' : ''; ?>"  href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($submenu_level2->LinkUrl)); ?>">
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
                                                        <a  target="<?php echo $submenus_level1->UrlType == app\models\MenuItem::URL_TYPE_EXTERNAL ? '_blank' : ''; ?>"   href="<?php echo \app\components\Utilities::generateUrl(html_entity_decode($submenus_level1->LinkUrl)); ?>">
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
            </ul>
            <?php
        }
    }
    ?>


</div>