
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
                        <a href = "<?php echo yii\helpers\Url::home(); ?>">Home</a>
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
            <br/>

            <?php
            foreach ($news as $new) {
                ?>
                <div class="row">
                    <div class="col-sm-8 col-md-10">
                        <h2 class="post-title">
                            <a href="<?php echo app\components\Utilities::createUrlString('connect/news/' . $new->LinkUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $new->TitleSw : $new->TitleEn ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="time">
                                <i class="fa fa-calendar"></i><?php echo Date('d.M.Y', strtotime($new->DatePosted)); ?></span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($new->DatePosted)); ?></span>
                        </div>

                        <div class="post-content"><?php echo substr((Yii::$app->language == 'sw' ? $new->DetailsSw : $new->DetailsEn), 0, 200); ?></div>

                        <a href="<?php echo app\components\Utilities::createUrlString('/connect/news/' . $new->LinkUrl) ?>" class="btn btn-default"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language] ?></a>

                    </div>
                </div>
                <hr>
                <?php
            }
            ?>

        </div> 

    </section>


<?php } ?>

