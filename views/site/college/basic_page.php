   
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
                    <p style="text-align: justify"><?php echo (Yii::$app->language == 'sw') ? $page_content->DescriptionSw : $page_content->DescriptionEn ?></p>
                </div>


                <!--SIDE MENU AREA-->
                <!--<div id="sidebar" class="sidebar col-sm-12 col-md-3">  OLD-->
                <div class="col-md-3 col-md-12 course-finder">
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
                        <?php } ?>           



                        <?php
                        if (isset($side_menus) && $side_menus) {
                            foreach ($side_menus as $key => $menu_group) {
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
                    }
                    ?>
                </div>
            </div>
<?php endif; ?>
    </div>
</section>


