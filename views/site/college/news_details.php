<?php
if (isset($page_content) && $page_content) {
    $title = Yii::$app->params['static_items']['news'][Yii::$app->language];
    ?>
    <div class=" page-title-left">
        <div class="container">
            <div class="section-title" style="margin-top: 2%">
                <h3 ><?php echo Yii::$app->params['static_items']['news'][Yii::$app->language]; ?></h3>
            </div>
        </div>
    </div>

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <div class="post-meta">
                        <h3><?php echo (Yii::$app->language == 'sw') ? $page_content->TitleSw : $page_content->TitleEn; ?></h3>

                        <span class="time">
                            <i class="fa fa-calendar"></i> <?php echo Date('D.M.Y ', strtotime($page_content->DatePosted)); ?></span>
                        <span class="time">
                            <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($page_content->DatePosted)); ?>
                        </span>
                    </div>

                    <div class="news-content">
                        <p><?php echo (Yii::$app->language == 'sw') ? $page_content->DetailsSw : $page_content->DetailsEn; ?></p>                              
                    </div>
                    <?php
                    if ($page_content->Attachment):
                        ?> 
                        <div class="news-content">
                            <?php echo Yii::$app->params['static_items']['attachment'][Yii::$app->language] . ': '; ?>
                            <a target="_blank" download href= "<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $page_content->Attachment); ?>">  <?php echo Yii::$app->params['static_items']['download'][Yii::$app->language]; ?></a>

                        </div>
                        <?php
                    endif;
                    ?>

                </div>

                <div class="col-sm-4 col-md-4">
                    <h3><?php echo Yii::$app->params['static_items']['other_news'][Yii::$app->language]; ?></h3>
                    <?php
                    if (isset($other_news) && $other_news) {
                        foreach ($other_news as $other_news) {
                            ?>
                            <a href="<?php echo app\components\Utilities::generateUrl($other_news->LinkUrl); ?>"> <?php echo Date('d, M Y > ',strtotime($other_news->DatePosted)); ?> <?php echo (Yii::$app->language == 'sw') ? $other_news->TitleSw : $other_news->TitleEn; ?></a>
                            <hr>
                            <?php
                        }
                    }
                    ?>

                    <?php
                    if (isset($side_menus) OR isset($side_blocks)) {
                        if (isset($side_menus) && $side_menus) {
                            ?>
                            <div class="widget">
                                <div class="widget-title">
                                    <h3 class="title"> <?php echo Yii::$app->params['static_items']['other_pages'][Yii::$app->language]; ?></h3>
                                </div>
                                <div id="MainMenu">
                                    <div class="list-group panel">
                                        <?php
                                        foreach ($side_menus as $menu) {
                                            ?>
                                            <a href="<?php echo \app\components\Utilities::generateUrl($menu->LinkUrl); ?>" class="list-group-item main-item"><?php echo (Yii::$app->language === 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn; ?></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- page-list -->
                            </div>
                        <?php } ?>

                        <?php
                        if (isset($side_blocks) && $side_blocks) {
                            foreach ($side_blocks as $custom_block) {
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
                    }
                    ?>
                </div>


            </div>

        </div> 

    </section>

<?php } ?>


