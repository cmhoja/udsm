<?php
if (isset($page_content) && $page_content) {
    $title = Yii::$app->params['static_items']['staff_list'][Yii::$app->language];
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
                <div class="pull-right col-sm-12 col-md-9">
                    <div class="section-title">
                        <!--<h2 class="title">Who is Who</h2>-->
                    </div>
                    <?php
                    foreach ($page_content as $leadership) {
                        ?>

                        <div class = "row">
                            <!--.employee -->

                            <div class="col-sm-3 col-md-3 bottom-xs-pad-20">
                                <?php if ($leadership->Photo):
                                    ?>
                                    <div class="image">
                                        <!-- Image -->
                                        <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $leadership->Photo; ?>" alt="" title="">
                                    </div>

                                <?php endif; ?>
                            </div>
                            <div class="col-sm-9 col-md-9 bottom-xs-pad-20">
                                <div class="description">
                                    <!-- Name -->
                                    <h4 class="name"><?php echo $leadership->FName . ' ' . $leadership->LName; ?></h4>
                                    <div class=""><?php echo (Yii::$app->language == 'sw') ? $leadership->EducationSw : $leadership->Education ?></div>
                                    <div class="role"><strong><?php echo (Yii::$app->language == 'sw') ? $leadership->PositionSw : $leadership->Position ?></strong></div>
                                    <!-- Text -->
                                    <p><?php echo (Yii::$app->language == 'sw') ? $leadership->SummarySw : $leadership->Summary ?></p>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <?php
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

    <?php
} else {
    echo $this->render('//site/emptypage');
}
?>




