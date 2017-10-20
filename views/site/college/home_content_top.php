<section id="who-we-are" class="page-section no-pad light-bg border-tb">
    <div class="container who-we-are">
        <div class="row">

            <div class="col-md-4">
                <?php
                if (isset($home_content_top_column1_blocks) && $home_content_top_column1_blocks) {
                    foreach ($home_content_top_column1_blocks as $custom_block1) {
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
            </div>

            <div class="col-md-4 announcements">
                <div class="section-title text-left">
                    <!-- Heading -->
                    <h2 class="title"><?php echo Yii::$app->params['static_items']['announcement'][Yii::$app->language]; ?></h2>
                </div>
                <?php
                if (isset($home_content_top_column2_announcements) && $home_content_top_column2_announcements) {
                    foreach ($home_content_top_column2_announcements as $announcement) {
                        ?>
                        <li>
                            <a href="<?php echo app\components\Utilities::generateUrl('/college/' . $this->params['unit_abbreviation_code'] . '/announcements/' . $announcement->LinkUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $announcement->TitleSw : $announcement->TitleEn; ?></a>
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
                        <a href="<?php echo app\components\Utilities::generateUrl('/college/' . $this->params['unit_abbreviation_code'] . '/announcements') ?>"><?php Echo Yii::$app->params['static_items']['view_all_announcement'][Yii::$app->language]; ?></a>
                    </div>
                <?php }
                ?>
            </div>

            <div class="col-md-4">
                <?php if (isset($home_content_top_column3_menus) && $home_content_top_column3_menus): ?>
                    <div class="text-left">
                        <!-- Title -->
                        <div class="section-title text-left">
                            <!-- Heading -->
                            <h2 class="title"><?php echo Yii::$app->params['static_items']['quick_links'][Yii::$app->language]; ?></h2>
                        </div>

                    </div>
                    <div id="sidebar quicklinks">
                        <div class="widget home-links">

                            <div id="MainMenu">
                                <div class="list-group ">
                                    <?php
                                    if (isset($home_content_top_column3_menus) && $home_content_top_column3_menus) {
                                        foreach ($home_content_top_column3_menus as $menu_item) {
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
                <?php endif; ?>

                <?php
                if (isset($home_content_top_column3_blocks) && $home_content_top_column3_blocks) {
                    foreach ($home_content_top_column3_blocks as $custom_block3) {
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

