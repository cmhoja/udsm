<div class="row">
    <!--CONTENT BOTTOM COLUMN 1-->
    <div class="col-md-4">
        <!--MENU ITEMS-->
        <?php
        if (isset($page_content_bottom_column1_menus) && $page_content_bottom_column1_menus) {
            foreach ($page_content_bottom_column1_menus as $key => $menu_group) {
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
        if (isset($page_content_bottom_column1_blocks) && $page_content_bottom_column1_blocks) {
            foreach ($page_content_bottom_column1_blocks as $content_column1) {
                ?>
                <div class="item"> 
                    <?php
                    if ($content_column1->BlockIconPicture) {
                        ?> 
                        <a href="<?php echo app\components\Utilities::generateUrl($content_column1->LinkToPage) ?>" ><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/bottom.jpg"></a>
                        <?php
                    }
                    ?>
                    <h5><strong><?php echo (Yii::$app->language == 'sw') ? $content_column1->BlockTitleSw : $content_column1->BlockTitleEn; ?></strong></h5>
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
        if (isset($page_content_bottom_column2_blocks) && $page_content_bottom_column2_blocks) {
            foreach ($page_content_bottom_column2_blocks as $content_column2) {
                ?>
                <div class="item"> 
                    <?php
                    if ($content_column2->BlockIconPicture) {
                        ?> 
                        <a href="<?php echo app\components\Utilities::generateUrl($content_column2->LinkToPage) ?>" ><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/bottom.jpg"></a>
                        <?php
                    }
                    ?>
                    <h5><strong><?php echo (Yii::$app->language == 'sw') ? $content_column2->BlockTitleSw : $content_column2->BlockTitleEn; ?></strong></h5>
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
        if (isset($page_content_bottom_column2_menus) && $page_content_bottom_column2_menus) {
            foreach ($page_content_bottom_column2_menus as $key => $menu_group) {
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


    <!--CONTENT BOTTOM COLUMN 3-->

    <div class="col-md-4">
        <?php
        if (isset($page_content_bottom_column3_blocks) && $page_content_bottom_column3_blocks) {
            foreach ($page_content_bottom_column3_blocks as $content_column3) {
                ?>
                <div class="item"> 
                    <?php
                    if ($content_column3->BlockIconPicture) {
                        ?> 
                        <a href="<?php echo app\components\Utilities::generateUrl($content_column3->LinkToPage) ?>" ><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/bottom.jpg"></a>
                        <?php
                    }
                    ?>
                    <h5><strong><?php echo (Yii::$app->language == 'sw') ? $content_column3->BlockTitleSw : $content_column3->BlockTitleEn; ?></strong></h5>
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
        if (isset($page_content_bottom_column3_menus) && $page_content_bottom_column3_menus) {
            foreach ($page_content_bottom_column3_menus as $key => $menu_group) {
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
