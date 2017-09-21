
<?php
if (isset($news) && $news) {
    $title = Yii::$app->params['static_items']['news'][Yii::$app->language];
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
                        <a href = "#"><?php echo Yii::$app->params['static_items']['Connect'][Yii::$app->language]; ?></a>
                    </li>
                    <li class = "active"><?php echo $title; ?></li>
                </ul>
            </div>

        </div>
    </div>

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <h3><?php echo (Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn; ?></h3>
                    <?php if ($news->Photo) { ?>
                        <div id="main-slider">
                            <div id="owl-demo" class="owl-carousel custom-styles" data-items="1" data-singleitem="true" data-pagination="false" data-navigation="true">
                                <div class="item">
                                    <a href="#">
                                        <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' .$news->Photo ?>" alt="" />
                                    </a>
                                </div>
<!--                                <div class="item">
                                    <a href="#">
                                        <img src="img/img2.png" alt="" />
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="#">
                                        <img src="img/img3.jpg" alt="" />
                                    </a>
                                </div>-->
                            </div>
                        </div>
                    <?php } ?>

                    <div class="news-content">
                        <p><?php echo (Yii::$app->language == 'sw') ? $news->DetailsSw : $news->DetailsEn; ?></p>	
                    </div>

                </div>

                <div class="col-sm-4 col-md-4">

                    <h3><?php echo Yii::$app->params['static_items']['other_news'][Yii::$app->language]; ?></h3>
                    <?php
                    if (isset($latest_news) && $latest_news) {
                        foreach ($latest_news as $latest_news) {
                            ?>
                            <a href="<?php echo app\components\Utilities::generateUrl('news/' . $latest_news->LinkUrl) ?>"> <?php echo (Yii::$app->language == 'sw') ? $latest_news->TitleSw : $latest_news->TitleEn; ?></a>
                            <hr>
                            <?php
                        }
                    }
                    ?>
                </div>


            </div>

        </div> 

    </section>
<?php } ?>



