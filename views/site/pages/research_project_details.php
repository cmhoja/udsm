<?php
$title = Yii::$app->params['static_items']['research_projects'][Yii::$app->language];
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
                    <a href = "#"><?php echo Yii::$app->params['static_items']['research'][Yii::$app->language]; ?></a>
                </li>
                <li class = "active"><?php echo $title; ?></li>
            </ul>
        </div>

    </div>
</div>


<section class="page-section">
    <div class="container">

        <div class="row">
            <div class="pull-right col-sm-12 col-md-9">
                <?php
                if (isset($page_content) && $page_content) {
                    ?>
                    <h3 style="text-align: justify;font-size: 1.6em"><?php echo (Yii::$app->language == 'sw') ? $page_content->ProjectNameSw : $page_content->ProjectNameEn; ?></h3>
                    <div class="news-content" style="margin-top: 2%">
                        <?php if ($page_content->UnitID): ?>
                            <span style=""><strong><?php echo Yii::$app->params['static_items']['adacemic_unit'][Yii::$app->language]; ?> : </strong></span>
                            <?php echo (app\models\AcademicAdministrativeUnit::getUnitNameById($page_content->UnitID)); ?>
                        <?php endif; ?>

                        <?php if ($page_content->StartYear): ?>
                            <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['duration_start'][Yii::$app->language]; ?> : </strong></span>
                            <?php echo $page_content->StartYear; ?>
                        <?php endif; ?>

                        <?php if ($page_content->EndYear): ?>
                            <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['duration_end'][Yii::$app->language]; ?> : </strong></span>
                            <?php echo $page_content->EndYear; ?>
                        <?php endif; ?>

                        <p style="text-align: justify;margin-top: 1%">
                            <?php echo (Yii::$app->language == 'sw') ? $page_content->DetailsSw : $page_content->DetailsEn; ?>
                        </p>	

                        <p>
                            <?php if ($page_content->FundingEn): ?>
                            <p style="text-align: justify">
                                <span>
                                    <strong><?php echo Yii::$app->params['static_items']['funding'][Yii::$app->language]; ?> :</strong><br/>
                                    <?php echo (Yii::$app->language == 'sw') ? $page_content->FundingSw : $page_content->FundingEn; ?>
                                </span>
                            </p>
                        <?php endif; ?>

                        <?php if ($page_content->Principal): ?>
                            <span><strong><?php echo Yii::$app->params['static_items']['principal_researcher'][Yii::$app->language]; ?> : </strong></span>
                            <?php echo $page_content->Principal; ?>
                        <?php endif; ?>


                        <?php if ($page_content->OtherResearcher): ?>
                            <br/><br/> <span><strong><?php echo Yii::$app->params['static_items']['other_researcher'][Yii::$app->language]; ?> : </strong></span>
                            <?php echo $page_content->OtherResearcher; ?>
                        <?php endif; ?>
                        </p>


                    </div>

                    <?php
                } else {
                    echo $this->render('//site/emptypage');
                }
                ?>
            </div>

            <div id="sidebar" class="sidebar col-sm-12 col-md-3">
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
            </div>
        </div>
    </div>
</section>





