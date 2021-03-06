   
<section class="page-section">
    <div class="container">
        <?php if (isset($page_content) && $page_content): ?>
            <h3><?php echo (Yii::$app->language == 'sw') ? $page_content->PageTitleSw : $page_content->PageTitleEn; ?></h3>
            <div class="row">
                <div class="pull-left col-sm-12 col-md-9">
                    <?php if (isset($page_content->Photo)):
                        ?>
                        <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $page_content->Photo; ?>">
                    <?php endif; ?>
                    <p style="text-align: justify">
                        <?php echo (Yii::$app->language == 'sw') ? $page_content->DescriptionSw : $page_content->DescriptionEn ?>
                    </p>
                </div>
                <!--CUSTOM_PAGE_CONTENT_TOP COLUMN1_3-->
                <div class="pull-left col-sm-12 col-md-9" style="border:1px solid red;">
                    <?php
                    var_dump($page_content_top_column1_blocks);
                    var_dump($page_content_top_column2_blocks);
                    var_dump($page_content_top_column3_blocks);
                    ?>
                </div>

                <!--CUSTOM_PAGE_CONTENT_TOP_LEFT_RIGHT--> 
                <div class="pull-left col-sm-12 col-md-9" style="border:1px solid red;">
                    <?php
                    var_dump($page_content_top_left_blocks);
                    var_dump($page_content_top_right_blocks);
                    ?>
                </div>

                <!--CUSTOM_PAGE_CONTENT_MIDDLE-->
                <div class="pull-left col-sm-12 col-md-9" style="border:1px solid red;">
                    <?php
                    var_dump($page_content_middle_blocks);
                    ?>
                </div>

                <!--CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1_3-->
                <div class="pull-left col-sm-12 col-md-9" style="border:1px solid red;">
                    <?php
                    var_dump($page_content_bottom_column1_blocks);
                    var_dump($page_content_bottom_column2_blocks);
                    var_dump($page_content_bottom_column3_blocks);
                    ?>
                </div>
                <!--CUSTOM_PAGE_CONTENT_BOTTOM_LEFT_RIGT-->
                <div class="pull-left col-sm-12 col-md-9" style="border:1px solid red;">
                    <?php
                    var_dump($page_content_bottom_left_blocks);
                    var_dump($page_content_bottom_right_blocks);
                    ?>

                </div>




                <!--SIDE MENU AREA-->
                <!--<div id="sidebar" class="sidebar col-sm-12 col-md-3">  OLD-->
                <div class="col-md-3 col-md-12 course-finder" style="border:1px solid red;">
                    <?php
                    //SOHWING ANY OTHER BLOCK ALLOCATED HERE
                    if (isset($side_menus_blocks) && $side_menus_blocks) {
                        foreach ($side_menus_blocks as $custom_block) {
                            ?>
                            <div class="text-left">
                                <!-- Title -->
                                <div class="section-title text-left">
                                    <!-- Heading -->
                                    <h2 class="title">
                                        <?php if (isset($custom_block->BlockIconCSSClass) && $custom_block->BlockIconCSSClass): ?>
                                            <i class="fa fa-graduation-cap"></i>
                                        <?php endif; ?>
                                        <?php echo (Yii::$app->language == 'sw') ? $custom_block->BlockTitleSw : $custom_block->BlockTitleEn; ?>
                                    </h2>

                                </div>
                                <?php if (isset($custom_block->BlockIconPicture) && $custom_block->BlockIconPicture): ?>
                                    <div style="padding: 2%;width: 95%">
                                        <img class="thumbnails" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $custom_block->BlockIconPicture; ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (!$custom_block->BlockIconPicture && $custom_block->BlockIconVideo): ?>
                                    <div style="padding: 1%">
                                        <?php echo $custom_block->BlockIconVideo; ?>
                                    </div>
                                <?php endif; ?>

                                <p class="text-justify">
                                    <?php
                                    echo substr((Yii::$app->language == 'sw') ? $custom_block->BlockDetailsSw : $custom_block->BlockDetailsEn, 0, 250);
                                    ?>
                                </p>

                            </div>
                            <?php
                        }
                    }
                    ?>  
                    <?php
                    if (isset($side_menus) && $side_menus) {
                        foreach ($side_menus as $side_menu) {
                            $menu_items = \app\models\MenuItem::getMenuItemsByMenuGroupIDAndStatus($side_menu->Id, \app\models\MenuItem::STATUS_ENABLED);
                            ?>
                            <div class="section-title text-left">
                                <h2 class="title"><?php echo (Yii::$app->language == 'sw') ? $side_menu->DisplayNameSw : $side_menu->DisplayNameEn; ?></h2>
                            </div>
                            <div class="course-additions">
                                <?php
                                foreach ($menu_items as $menus) {
                                    ?>
                                    <li>
                                        <i class="fa-info-circle"></i> 
                                        <a target="<?php ($menus->UrlType == \app\models\MenuItem::URL_TYPE_EXTERNAL) ? '_blank' : ''; ?>" href="<?php echo app\components\Utilities::generateUrl($menus->LinkUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $menus->ItemNameSw : $menus->ItemNameEn; ?></a>
                                    </li>
                                    <?php
                                }
//                                   
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>


                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


