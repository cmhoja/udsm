
<?php
if (isset($announcements) && $announcements) {
    $title = Yii::$app->params['static_items']['announcement'][Yii::$app->language];
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
            <br/>
            <?php
            foreach ($announcements as $announcement) {
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h2 class="post-title">
                            <a href="<?php echo app\components\Utilities::createUrlString('announcements/' . $announcement->LinkUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $announcement->TitleSw : $announcement->TitleEn ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="time">
                                <i class="fa fa-calendar"></i><?php echo Date('d.M.Y', strtotime($announcement->DatePosted)); ?></span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($announcement->DatePosted)); ?></span>
                        </div>

                        <div class="post-content"><?php echo substr((Yii::$app->language == 'sw' ? $announcement->DetailsSw : $announcement->DetailsEn), 0, 200); ?></div>

                        <a href="<?php echo app\components\Utilities::createUrlString('announcements/' . $announcement->LinkUrl) ?>" class="btn btn-default"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language] ?></a>

                    </div>
                </div>
                <hr>
                <?php
            }
            ?>
           
        </div> 

    </section>


<?php } ?>

