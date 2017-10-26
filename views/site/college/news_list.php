<?php
$this->title = Yii::$app->params['static_items']['news'][Yii::$app->language];
?>

<section class="page-section">

    <div class="container">
        <div class="row">

            <div class="pull-left col-sm-12 col-md-9">
                <div class="section-title" style="margin-bottom: 3%;">
                    <h3 ><?php echo Yii::$app->params['static_items']['news'][Yii::$app->language]; ?></h3>
                </div>
                <div class="col-md-12 col-md-12">
                    <?php
                    if (isset($page_content) && $page_content) {

                        foreach ($page_content as $news) {
                            $newsTitle = (Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn;
                            ?>
                            <div class="row">
                                <?php if (!empty($news->Photo)): ?>
                                    <div class="col-sm-4 col-md-2">
                                        <div class="pull-left">
                                            <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $news->Photo; ?> " alt="" title="">
                                        </div>

                                    </div>
                                <?php endif; ?>
                                <div class="col-sm-8 col-md-10">
                                    <h2 class="post-title">
                                        <a href="<?php echo app\components\Utilities::generateUrl($news->LinkUrl); ?>"><?php echo $newsTitle; ?></a>
                                    </h2>
                                    <div class="post-meta">

                                        <span class="time">
                                            <i class="fa fa-calendar"></i> <?php echo Date('D.M.Y @ H:i:s', strtotime($news->DatePosted)); ?></span>
                                    </div>

                                    <div class="post-content"><p><?php echo substr((Yii::$app->language == 'sw') ? $news->DetailsSw : $news->DetailsEn, 0, 250); ?></p></div>

                                    <a href="<?php echo app\components\Utilities::generateUrl($news->LinkUrl); ?>" class="btn btn-default"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>

                                </div>

                            </div><hr>
                            <?php
                        }
                        ?>

                        <?php
                    } else {
                        echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                    }
                    ?>
                </div>
            </div>


            <?php if (isset($side_menus) OR isset($side_blocks)) { ?>
                <div id="sidebar" class="sidebar col-sm-12 col-md-3">
                    <?php if (isset($side_menus) && $side_menus) {
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
                    ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>


<!--request -->
