
<section id="testimonials" class="page-section testimonails">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title text-left">
                    <!-- Heading -->
                    <h2 class="title"><?php echo strtoupper(Yii::$app->params['static_items']['news'][Yii::$app->language]); ?></h2>
                </div>
                <?php if (isset($home_content_middle_left_news) && $home_content_middle_left_news): ?>
                    <ul class="latest-posts">

                        <?php foreach ($home_content_middle_left_news as $news) { ?>
                            <li>
                                <?php if (!empty($news->Photo)): ?>
                                    <div class="post-thumb">
                                        <img class="img-rounded" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $news->Photo; ?>" alt="" title="" width="100" height="100">

                                    </div>
                                <?php endif; ?>
                                <div class="post-details">
                                    <div class="description">
                                        <a href="<?php echo app\components\Utilities::generateUrl($news->LinkUrl) ?>">
                                            <?php echo (Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn ?>
                                        </a>
                                    </div>
                                    <div class="meta">
                                        <!-- Meta Date -->
                                        <span class="time">
                                            <i class="fa fa-calendar"></i> <?php echo Date('d.M.Y', strtotime($news->DatePosted)); ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                    <hr>
                    <a href="<?php echo app\components\Utilities::generateUrl('/colleges/' . $this->params['unit_abbreviation_code'] . '/news') ?>"><?php echo Yii::$app->params['static_items']['view_all'][Yii::$app->language]; ?></a>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <?php
                if (isset($home_content_middle_right_blocks)) {
                    foreach ($home_content_middle_right_blocks as $block) {
                        ?>
                        <div class="section-title text-left">
                            <!-- Heading -->
                            <h2 class="title">
                                <?php if (isset($block->BlockIconCSSClass) && $block->BlockIconCSSClass): ?>
                                    <i class="fa <?php echo $block->BlockIconCSSClass; ?>"></i>
                                <?php endif; ?>
                                <?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn; ?>
                            </h2>
                        </div>
                        <?php if (isset($block->BlockIconPicture) && $block->BlockIconPicture): ?>
                            <a href="<?php echo app\components\Utilities::generateUrl($block->LinkToPage) ?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block->BlockIconPicture; ?>"></a>
                        <?php endif; ?>

                        <?php if (!$block->BlockIconPicture && $block->BlockIconVideo): ?>
                            <div style="padding: 1%">
                                <?php echo $block->BlockIconVideo; ?>
                            </div>
                        <?php endif; ?>
                        <p><?php echo substr((Yii::$app->language == 'sw') ? $block->BlockDetailsSw : $block->BlockDetailsEn, 0, 400); ?></p>
                        <?php if ($block->LinkToPage): ?>
                            <a href="<?php echo app\components\Utilities::generateUrl($block->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read'][Yii::$app->language]; ?></a>
                        <?php endif; ?>
                        <?php
                    }
                }
                ?>

                <!--MENU ITEMS-->
                <?php
                if (isset($home_content_middle_right_menus) && $home_content_middle_right_menus) {
                    foreach ($home_content_middle_right_menus as $key => $menu_group) {
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