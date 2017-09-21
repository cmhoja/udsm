<?php
$page_content = $page_content;
//$content = array('page_content' => $page_content, 'side_menus' => $page_side_menus, 'custom_blocks' => $custom_blocks);

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
                        <a href = "#"><?php echo Yii::$app->params['static_items']['page'][Yii::$app->language];
    ?></a>
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
                    <h4><?php echo $title; ?></h4>
                    <p><?php echo (Yii::$app->language == 'sw') ? $page_content->DescriptionSw : $page_content->DescriptionEn; ?></p>
                    <?php if ($page_content->Photo) { ?>
                        <img src = "<?php $page_content->Photo ?>">

                    <?php } ?>
                    <?php if ($page_content->EmbededVideo) { ?>
                        <div class="videoWrapper">
                            <?php echo $page_content->EmbededVideo; ?>
                        </div>
                    <?php } ?>

                 
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




