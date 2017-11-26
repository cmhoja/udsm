<?php
$this->title = Yii::$app->params['static_items']['research'][Yii::$app->language];
?>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="pull-right col-sm-12 col-md-9"> 
                <h3 style="margin-bottom: 2%;margin-left: 1.2%"><?php echo Yii::$app->params['static_items']['research_details'][Yii::$app->language]; ?></h3>
                <?php if ($page_content) { ?>
                    <div class = "container">
                        <div class = "row">
                            <div class = "col-sm-12 col-md-12">
                                <h3 style = "text-align: justify">
                                    <?php echo (Yii::$app->language == 'sw') ? $page_content->ProjectNameSw : $page_content->ProjectNameEn; ?>
                                </h3>
                                <div class="news-content">
                                    <p>
                                        <?php if ($page_content->StartYear): ?>
                                            <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['start_year'][Yii::$app->language]; ?> : </strong></span>
                                            <?php echo $page_content->StartYear; ?>
                                        <?php endif; ?>

                                        <?php if ($page_content->EndYear): ?>
                                            <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['end_year'][Yii::$app->language]; ?> : </strong></span>
                                            <?php echo $page_content->EndYear; ?>
                                        <?php endif; ?>

                                        <?php if ($page_content->Principal): ?>
                                            <br/><br/> <span><strong><?php echo Yii::$app->params['static_items']['principal_researcher'][Yii::$app->language]; ?> : </strong></span>
                                            <?php echo $page_content->Principal; ?>
                                        <?php endif; ?>

                                        <?php if ($page_content->OtherResearcher): ?>
                                            <span><strong><?php echo Yii::$app->params['static_items']['other_researcher'][Yii::$app->language]; ?> : </strong></span>
                                            <?php echo $page_content->OtherResearcher; ?>
                                        <?php endif; ?>

                                        <?php if ($page_content->UnitID): ?>
                                            <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['adacemic_unit'][Yii::$app->language]; ?> : </strong></span>
                                            <?php echo (app\models\AcademicAdministrativeUnit::getUnitNameById($page_content->UnitID)); ?>
                                        <?php endif; ?>
                                    </p>

                                    <p style="text-align: justify">
                                        <?php echo (Yii::$app->language == 'sw') ? $page_content->DetailsSw : $page_content->DetailsEn; ?>
                                    </p>
                                    <?php if ($page_content->FundingEn or $page_content->FundingSw): ?>
                                        <p style="text-align: justify">
                                            <span>
                                                <strong><?php echo Yii::$app->params['static_items']['funding'][Yii::$app->language]; ?></strong><br/>
                                                <?php echo (Yii::$app->language == 'sw') ? $page_content->FundingSw : $page_content->FundingEn; ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div> 
                    <?php
                } else {
                    echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                }
                ?>

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
                        foreach ($side_blocks as $block) {
                            ?>

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
