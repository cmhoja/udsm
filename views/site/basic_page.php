<?php
//$page_content = $page_content;

if (isset($page_content) && $page_content) {
    $title = (Yii::$app->language == 'sw') ? $page_content->PageTitleSw : $page_content->PageTitleEn;
    ?>
    <div class="page-header page-title-left">
        <div class="container">
            <div class="col-md-12 no-pad">
                <h1 class="title"><?php echo $title; ?> </h1>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "<?php echo yii\helpers\Url::home(); ?>"><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?></a>
                    </li>
                    <li>
                        <a href = "#"><?php echo Yii::$app->params['static_items']['page'][Yii::$app->language]; ?></a>
                    </li>
                    <li class = "active"><?php echo $title; ?></li>
                </ul>
            </div>

        </div>
    </div>


    <section class="page-section">
        <div class="container">

            <div class="row">
                <div class="pull-right col-md-12 col-md-9">
                    <div class="col-sm-12">
                        <h4><?php echo $title; ?></h4>

                        <?php if (isset($page_content->Photo)):
                            ?>
                            <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $page_content->Photo; ?>">
                        <?php endif; ?>

                        <?php if (!$page_content->Photo && $page_content->EmbededVideo) { ?>
                            <div class="videoWrapper">
                                <?php echo $page_content->EmbededVideo; ?>
                            </div>
                        <?php } ?>
                        <p><?php echo (Yii::$app->language == 'sw') ? $page_content->DescriptionSw : $page_content->DescriptionEn; ?></p>

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

                    <!--PAGE OTHER REGIONS-->
                    <!--CUSTOM_PAGE_CONTENT_TOP COLUMN1_3-->
                    <?php
                    if (isset($page_content_top_column1_blocks) OR isset($page_content_top_column2_blocks)OR isset($page_content_top_column3_blocks)) {
                        $params = [
                            'page_content_top_column1_blocks' => $page_content_top_column1_blocks,
                            'page_content_top_column2_blocks' => $page_content_top_column2_blocks,
                            'page_content_top_column3_blocks' => $page_content_top_column3_blocks
                        ];
                        echo $this->render('//site/basic_page/basic_page_content_top_column13', $params);
                    }
                    ?>

                    <!--CUSTOM_PAGE_CONTENT_TOP_LEFT_RIGHT--> 
                    <?php
                    if (isset($page_content_top_left_blocks) OR isset($page_content_top_right_blocks)) {
                        $params = [
                            'page_content_top_left_blocks' => $page_content_top_left_blocks,
                            'page_content_top_right_blocks' => $page_content_top_right_blocks,
                        ];
                        echo $this->render('//site/basic_page/basic_page_content_top_left_right', $params);
                    }
                    ?>

                    <!--CUSTOM_PAGE_CONTENT_MIDDLE-->
                    <?php
                    if (isset($page_content_middle_blocks)) {
                        $params = [
                            'page_content_middle_blocks' => $page_content_middle_blocks,
                        ];
                        echo $this->render('//site/basic_page/basic_page_content_middle', $params);
                    }
                    ?>

                    <!--CUSTOM_PAGE_CONTENT_BOTTOM_COLUMN1_3-->
                    <?php
                    if (isset($page_content_bottom_column1_blocks) OR isset($page_content_bottom_column2_blocks)OR isset($page_content_bottom_column3_blocks)) {
                        $params = [
                            'page_content_bottom_column1_blocks' => $page_content_bottom_column1_blocks,
                            'page_content_bottom_column2_blocks' => $page_content_bottom_column2_blocks,
                            'page_content_bottom_column3_blocks' => $page_content_bottom_column3_blocks
                        ];
                        echo $this->render('//site/basic_page/basic_page_content_bottom_column13', $params);
                    }
                    ?>

                    <!--CUSTOM_PAGE_CONTENT_BOTTOM_LEFT_RIGT-->
                    <?php
                    if (isset($page_content_bottom_right_blocks) OR isset($page_content_bottom_left_blocks)) {
                        $params = [
                            'page_content_bottom_left_blocks' => $page_content_bottom_left_blocks,
                            'page_content_bottom_right_blocks' => $page_content_bottom_right_blocks,
                        ];
                        echo $this->render('//site/basic_page/basic_page_content_bottom_left_right', $params);
                    }
                    ?>
                </div>

                <!--PAGE SIDE COLUMN FOR SIDE MENU AND SIDE BLOCK-->
                <div id="sidebar" class="sidebar col-sm-12 col-md-3">
                    <!--SIDE MENU-->
                    <div class="widget">
                        <div class="widget-title">
                            <h3 class="title"> <?php echo Yii::$app->params['static_items']['other_pages'][Yii::$app->language]; ?></h3>
                        </div>
                        <div id="MainMenu">
                            <div class="list-group panel">
                                <?php
                                if (isset($side_menus) && $side_menus) {
                                    foreach ($side_menus as $menu) {
                                        ?>
                                        <a href="<?php echo \app\components\Utilities::generateUrl($menu->LinkUrl); ?>" class="list-group-item main-item"><?php echo (Yii::$app->language === 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn; ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- page-list -->
                    </div>

                    <!--SIDE BLOCK-->
                    <div class="widget">
                        <?php
                        //SHOWING ANY OTHER BLOCK ALLOCATED HERE
                        if (isset($side_menus_blocks) && $side_menus_blocks) {
                            foreach ($side_menus_blocks as $custom_block) {
                                ?>
                                <div class="text-left">
                                    <!-- Title -->
                                    <div class="section-title text-left">
                                        <!-- Heading -->
                                        <h2 class="title">
                                            <?php if (isset($custom_block->BlockIconCSSClass) && $custom_block->BlockIconCSSClass): ?>
                                                <i class="fa <?php echo $custom_block->BlockIconCSSClass; ?>"></i>
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
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    echo $this->render('//site/emptypage');
}
?>




