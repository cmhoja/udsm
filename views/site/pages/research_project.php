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
                    foreach ($page_content as $research) {
                        ?>
                        <a href="<?php echo app\components\Utilities::generateUrl('/research/project/' . $research->PageLinkUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $research->ProjectNameSw : $research->ProjectNameEn; ?></a>
                        <hr>
                        <?php
                    }
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





