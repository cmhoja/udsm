<section id="who-we-are" class="page-section no-pad light-bg border-tb">
    <div class="container who-we-are">
        <div class="row">
            <!--TOP LEFT-->
            <div class="col-md-4">
                <?php
                if (isset($home_content_top_left_blocks) && $home_content_top_left_blocks) {
                    foreach ($home_content_top_left_blocks as $custom_block1) {
                        ?>

                        <div class="text-left">
                            <!-- Title -->
                            <div class="section-title text-left">
                                <!-- Heading -->
                                <h2 class="title">
                                    <?php if (isset($custom_block1->BlockIconCSSClass) && $custom_block1->BlockIconCSSClass): ?>
                                        <i class="fa <?php echo $custom_block1->BlockIconCSSClass; ?>"></i>
                                    <?php endif; ?>
                                    <?php echo (Yii::$app->language == 'sw') ? $custom_block1->BlockTitleSw : $custom_block1->BlockTitleEn; ?>
                                </h2>

                            </div>
                            <?php if (isset($custom_block1->BlockIconPicture) && $custom_block1->BlockIconPicture): ?>
                                <div style="padding: 2%;width: 95%">
                                    <img class="thumbnails" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $custom_block1->BlockIconPicture; ?>">
                                </div>
                            <?php endif; ?>

                            <?php if (!$custom_block1->BlockIconPicture && $custom_block1->BlockIconVideo): ?>
                                <div style="padding: 1%">
                                    <?php echo $custom_block1->BlockIconVideo; ?>
                                </div>
                            <?php endif; ?>

                            <p>
                                <?php
                                echo substr((Yii::$app->language == 'sw') ? $custom_block1->BlockDetailsSw : $custom_block1->BlockDetailsEn, 0, 250);
                                ?>
                            </p>

                        </div>

                        <?php
                    }
                }
                ?>

                <!--MENU ITEMS-->
                <?php
                if (isset($home_content_top_left_menus) && $home_content_top_left_menus) {
                    foreach ($home_content_top_left_menus as $key => $menu_group) {
                        ?>
                        <?php
                        if ($menu_group['DisplayNameEn'] OR $menu_group['DisplayNameSw']):
                            $menu_group_title = (Yii::$app->language == 'sw') ? $menu_group['DisplayNameSw'] : $menu_group['DisplayNameEn'];
                            ?>
                            <div class="section-title text-left">
                                <!-- Heading -->
                                <h2 class="title"><?php echo $menu_group_title; ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="course-additions">
                            <?php
                            if ($menu_group['MenuItems'] && $menu_group['MenuItems']) {
                                foreach ($menu_group['MenuItems'] as $menus) {
                                    ?>
                                    <li><i class="fa-info-circle"></i> <a  href="<?php echo app\components\Utilities::generateUrl($menus->LinkUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $menus->ItemNameSw : $menus->ItemNameEn; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>

            <!--ANNOUNCEMENT-->
            <div class="col-md-4 announcements">
                <div class="section-title text-left">
                    <!-- Heading -->
                    <h2 class="title"><?php echo Yii::$app->params['static_items']['announcement'][Yii::$app->language]; ?></h2>
                </div>
                <?php
                if (isset($home_content_top_middle_announcements) && $home_content_top_middle_announcements) {
                    foreach ($home_content_top_middle_announcements as $announcement) {
                        ?>
                        <li>
                            <a href="<?php echo app\components\Utilities::generateUrl($announcement->LinkUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $announcement->TitleSw : $announcement->TitleEn; ?></a>
                            <div class="post-meta">
                                <span class="time">
                                    <i class="fa fa-calendar"></i> <?php echo Date('D, d.m.Y', strtotime($announcement->DatePosted)); ?></span>
                                <span class="time">
                                    <i class="fa fa-clock-o"></i> <?php echo Date('H:i', strtotime($announcement->DatePosted)); ?></span>
                            </div>
                        </li>
                        <hr>
                        <?php
                    }
                    ?>
                    <div class="col-md-12 events no-pad">
                        <a href="<?php echo app\components\Utilities::generateUrl(trim('/colleges/' . $this->params['unit_abbreviation_code'] . '/announcements'));  ?>"><?php Echo Yii::$app->params['static_items']['view_all_announcement'][Yii::$app->language]; ?></a>
                    </div>
                <?php }
                ?>
            </div>

            <!--TOP RIGHT-->

            <div class="col-md-4">
                <?php if (isset($home_content_top_right_menus) && $home_content_top_right_menus): ?>
                    <?php
                    foreach ($home_content_top_right_menus as $key => $menu_group) {
                        ?>
                        <?php
                        if ($menu_group['DisplayNameEn'] OR $menu_group['DisplayNameSw']):
                            $menu_group_title = (Yii::$app->language == 'sw') ? $menu_group['DisplayNameSw'] : $menu_group['DisplayNameEn'];
                            ?>
                            <div class="section-title text-left">
                                <!-- Heading -->
                                <h2 class="title"><?php echo $menu_group_title; ?></h2>
                            </div>
                        <?php endif; ?>
                        <div id="sidebar quicklinks">
                            <div class="widget home-links">

                                <div id="MainMenu">
                                    <div class="list-group ">
                                        <?php
                                        if ($menu_group['MenuItems'] && $menu_group['MenuItems']) {
                                            foreach ($menu_group['MenuItems'] as $menu_item) {
                                                ?>
                                                <a href = "<?php echo app\components\Utilities::generateUrl($menu_item->LinkUrl) ?>" class = "list-group-item main-item"><?php echo (Yii::$app->language == 'sw') ? $menu_item->ItemNameSw : $menu_item->ItemNameEn; ?></a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- page-list -->
                            </div>
                        </div>
                        <?php
                    }
                endif;
                ?>

                <?php
                if (isset($home_content_top_right_blocks) && $home_content_top_right_blocks) {
                    foreach ($home_content_top_right_blocks as $custom_block3) {
                        ?>

                        <div class="text-left">
                            <!-- Title -->
                            <div class="section-title text-left">
                                <!-- Heading -->
                                <h2 class="title">
                                    <?php if (isset($custom_block3->BlockIconCSSClass) && $custom_block3->BlockIconCSSClass): ?>
                                        <i class="fa <?php echo $custom_block3->BlockIconCSSClass; ?>"></i>
                                    <?php endif; ?>
                                    <?php echo (Yii::$app->language == 'sw') ? $custom_block3->BlockTitleSw : $custom_block3->BlockTitleEn; ?>
                                </h2>

                            </div>
                            <?php if (isset($custom_block3->BlockIconPicture) && $custom_block3->BlockIconPicture): ?>
                                <div style="padding: 2%;width: 95%">
                                    <img class="thumbnails" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $custom_block3->BlockIconPicture; ?>">
                                </div>
                            <?php endif; ?>

                            <?php if (!$custom_block3->BlockIconPicture && $custom_block3->BlockIconVideo): ?>
                                <div style="padding: 1%">
                                    <?php echo $custom_block3->BlockIconVideo; ?>
                                </div>
                            <?php endif; ?>

                            <p>
                                <?php
                                echo substr((Yii::$app->language == 'sw') ? $custom_block3->BlockDetailsSw : $custom_block3->BlockDetailsEn, 0, 250);
                                ?>
                            </p>

                        </div>

                        <?php
                    }
                }
                ?>
            </div>



        </div>
    </div>
</section>

