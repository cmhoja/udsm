<section id="testimonials" class="page-section testimonails">
    <div class="container">
        <div class="row">
            <!--CONTENT BOTTOM COLUMN 1-->

            <div class="col-md-4">
                <!--MENU ITEMS-->
                <?php
                if (isset($home_content_bottom_column1_menus) && $home_content_bottom_column1_menus) {
                    foreach ($home_content_bottom_column1_menus as $key => $menu_group) {
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
                <?php
                if (isset($home_content_bottom_column1_blocks) && $home_content_bottom_column1_blocks) {
                    foreach ($home_content_bottom_column1_blocks as $content_column1) {
                        ?>
                        <div class="item"> 
                            <?php
                            if ($content_column1->BlockIconPicture) {
                                ?> 
                                <a href="<?php echo app\components\Utilities::generateUrl($content_column1->LinkToPage) ?>" >
                                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $content_column1->BlockIconPicture; ?>">
                                </a>
                                <?php
                            }
                            ?>
                            <?php if (!$content_column1->BlockIconPicture && $content_column1->BlockIconVideo): ?>
                                <div style="padding: 1%;">
                                    <?php echo $content_column1->BlockIconVideo; ?>
                                </div>
                            <?php endif; ?>
                            <h5>
                                <?php if (isset($content_column1->BlockIconCSSClass) && $content_column1->BlockIconCSSClass): ?>
                                    <i class="fa <?php echo $content_column1->BlockIconCSSClass; ?>"></i>
                                <?php endif; ?>
                                <p><?php echo substr((Yii::$app->language == 'sw') ? $content_column1->BlockDetailsSw : $content_column1->BlockDetailsEn, 0, 170); ?></p>
                                <?php if ($content_column1->LinkToPage): ?>
                                    <a href="<?php echo app\components\Utilities::generateUrl($content_column1->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                                <?php endif; ?>
                        </div>
                        <?php
                    }
                }
                ?> </div>


            <!--CONTENT BOTTOM COLUMN 2-->

            <div class="col-md-4">
                <?php
                if (isset($home_content_bottom_column2_blocks) && $home_content_bottom_column2_blocks) {
                    foreach ($home_content_bottom_column2_blocks as $content_column2) {
                        ?>
                        <div class="item"> 
                            <?php
                            if ($content_column2->BlockIconPicture) {
                                ?> 
                                <a href="<?php echo app\components\Utilities::generateUrl($content_column2->LinkToPage) ?>" >
                                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $content_column2->BlockIconPicture; ?>">

                                </a>
                                <?php
                            }
                            ?>
                            <?php if (!$content_column2->BlockIconPicture && $content_column2->BlockIconVideo): ?>
                                <div style="padding: 1%;">
                                    <?php echo $content_column2->BlockIconVideo; ?>
                                </div>
                            <?php endif; ?>
                            <h5>
                                <?php if (isset($content_column2->BlockIconCSSClass) && $content_column2->BlockIconCSSClass): ?>
                                    <i class="fa <?php echo $content_column2->BlockIconCSSClass; ?>"></i>
                                <?php endif; ?>
                                <p class="text-justify"><?php echo substr((Yii::$app->language == 'sw') ? $content_column2->BlockDetailsSw : $content_column2->BlockDetailsEn, 0, 170); ?></p>
                                <?php if ($content_column2->LinkToPage): ?>
                                    <a href="<?php echo app\components\Utilities::generateUrl($content_column2->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                                <?php endif; ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <!--MENU ITEMS-->
                <?php
                if (isset($home_content_bottom_column2_menus) && $home_content_bottom_column2_menus) {
                    foreach ($home_content_bottom_column2_menus as $key => $menu_group) {
                        ?>
                        <?php
                        if ($menu_group['DisplayNameEn'] OR $menu_group['DisplayNameSw']):
                            $menu_group_title = (Yii::$app->language == 'sw') ? $menu_group['DisplayNameSw'] : $menu_group['DisplayNameEn'];
                            ?>
                            <div class="section-title text-left">
                                <!-- Heading -->
                                <h2 class="title">
                                    <?php echo $menu_group_title; ?></h2>
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


            <!--CONTENT BOTTOM COLUMN 3-->

            <div class="col-md-4">
                <?php
                if (isset($home_content_bottom_column3_blocks) && $home_content_bottom_column3_blocks) {
                    foreach ($home_content_bottom_column3_blocks as $content_column3) {
                        ?>
                        <div class="item"> 
                            <?php
                            if ($content_column3->BlockIconPicture) {
                                ?> 
                                <a href="<?php echo app\components\Utilities::generateUrl($content_column3->LinkToPage) ?>" >
                                    <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $content_column3->BlockIconPicture; ?>">
                                </a>
                                <?php
                            }
                            ?>
                            <?php if (!$content_column3->BlockIconPicture && $content_column3->BlockIconVideo): ?>
                                <div style="padding: 1%;">
                                    <?php echo $content_column3->BlockIconVideo; ?>
                                </div>
                            <?php endif; ?>
                            <h5>
                                <?php if (isset($content_column3->BlockIconCSSClass) && $content_column3->BlockIconCSSClass): ?>
                                    <i class="fa <?php echo $content_column3->BlockIconCSSClass; ?>"></i>
                                <?php endif; ?>
                                <p class="text-justify"><?php echo substr((Yii::$app->language == 'sw') ? $content_column3->BlockDetailsSw : $content_column3->BlockDetailsEn, 0, 170); ?></p>
                                <?php if ($content_column3->LinkToPage): ?>
                                    <a href="<?php echo app\components\Utilities::generateUrl($content_column3->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                                <?php endif; ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <!--MENU ITEMS-->
                <?php
                if (isset($home_content_bottom_column3_menus) && $home_content_bottom_column3_menus) {
                    foreach ($home_content_bottom_column3_menus as $key => $menu_group) {
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

        </div>
    </div>
</section>