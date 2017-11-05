
<div class="row">
    <div class="col-md-8">
        <?php
        if (isset($page_content_bottom_left_blocks)) {
            foreach ($page_content_bottom_left_blocks as $block) {
                ?>
                <?php if (isset($block->BlockIconPicture) && $block->BlockIconPicture): ?>
                    <a href="<?php echo app\components\Utilities::generateUrl($block->LinkToPage) ?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $block->BlockIconPicture; ?>"></a>
                <?php endif; ?>

                <?php if (!$block->BlockIconVideo && $block->BlockIconVideo): ?>
                    <div style="padding: 1%">
                        <?php echo $block->BlockIconVideo; ?>
                    </div>
                <?php endif; ?>
                <div class="section-title text-left">
                    <h2 class="title"><?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn; ?></h2>
                </div>
                <p><?php echo substr((Yii::$app->language == 'sw') ? $block->BlockDetailsSw : $block->BlockDetailsEn, 0, 200); ?></p>

                <?php
            }
        }
        ?>

        <!--MENU ITEMS-->
        <?php
        if (isset($page_content_bottom_left_menus) && $page_content_bottom_left_menus) {
            foreach ($page_content_bottom_left_menus as $key => $menu_group) {
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

    <div class="col-md-4">
        <?php
        if (isset($page_content_bottom_right_blocks)) {
            foreach ($page_content_bottom_right_blocks as $block) {
                ?>
                <div class="section-title text-left">
                    <!-- Heading -->
                    <h2 class="title"><?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn; ?></h2>
                </div>
                <?php if (isset($block->BlockIconPicture) && $block->BlockIconPicture): ?>
                    <a href="<?php echo app\components\Utilities::generateUrl($block->LinkToPage) ?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $block->BlockIconPicture; ?>"></a>
                <?php endif; ?>

                <?php if (!$block->BlockIconVideo && $block->BlockIconVideo): ?>
                    <div style="padding: 1%">
                        <?php echo $block->BlockIconVideo; ?>
                    </div>
                <?php endif; ?>
                <p><?php echo substr((Yii::$app->language == 'sw') ? $block->BlockDetailsSw : $block->BlockDetailsEn, 0, 200); ?></p>

                <?php
            }
        }
        ?>

        <!--MENU ITEMS-->
        <?php
        if (isset($page_content_bottom_right_menus) && $page_content_bottom_right_menus) {
            foreach ($page_content_bottom_right_menus as $key => $menu_group) {
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

