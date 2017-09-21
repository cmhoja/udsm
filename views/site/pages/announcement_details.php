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
            <div class="row">
                <div class="col-sm-8 col-md-8">
                    <div class="post-meta">
                        <h3><?php echo (Yii::$app->language == 'sw') ? $announcements->TitleSw : $announcements->TitleEn; ?></h3>

                        <span class="time">
                            <i class="fa fa-calendar"></i> <?php echo Date('D.M.Y ', strtotime($announcements->DatePosted)); ?></span>
                        <span class="time">
                            <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($announcements->DatePosted)); ?>
                        </span>
                    </div>

                    <div class="news-content">
                        <p><?php echo (Yii::$app->language == 'sw') ? $announcements->DetailsSw : $announcements->DetailsEn; ?></p>                              
                    </div>

                </div>

                <div class="col-sm-4 col-md-4">
                    <h3><?php echo Yii::$app->params['static_items']['other_announcement'][Yii::$app->language]; ?></h3>
                    <?php
                    if (isset($latest_announcements) && $latest_announcements) {
                        foreach ($latest_announcements as $latest_announcements) {
                            ?>
                            <a href="<?php echo app\components\Utilities::generateUrl('/announcements/' . $latest_announcements->LinkUrl); ?>"> <?php echo (Yii::$app->language == 'sw') ? $latest_announcements->TitleSw : $latest_announcements->TitleEn; ?></a>
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


