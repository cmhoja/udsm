<?php
if (isset($events) && $events) {
    $title = Yii::$app->params['static_items']['events'][Yii::$app->language];
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
                        <h3><?php echo (Yii::$app->language == 'sw') ? $events->EventTitleSw : $events->EventTitleEn; ?></h3>

                        <span class="time">
                            <i class="fa fa-calendar"></i> <?php echo Date('D.M.Y ', strtotime($events->StartDate)); ?></span>
                        <span class="time">
                            <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($events->StartDate)); ?>
                        </span>
                    </div>

                    <div class="news-content">
                        <p><?php echo (Yii::$app->language == 'sw') ? $events->DescriptionSw : $events->DescriptionEn; ?></p>                              
                        <p>
                            <?php if ($events->Attachment): ?>
                                <span class="time">
                                    <i class="fa fa-paperclip"></i> 
                                    <b><?php echo Yii::$app->params['static_items']['attachment'][Yii::$app->language]; ?></b>:  
                                    <a target="_blank" download="" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/../' . (Yii::$app->params['file_upload_main_site'] . '/' . $events->Attachment) ?>" >
                                        <?php echo $events->Attachment; ?> 
                                    </a>
                                </span>
                            <?php endif; ?>
                        </p>
                    </div>

                </div>

                <div class="col-sm-4 col-md-4">

                    <h3><?php echo Yii::$app->params['static_items']['other_events'][Yii::$app->language]; ?></h3>
                    <?php
                    if (isset($latest_events) && $latest_events) {
                        foreach ($latest_events as $latest_events) {
                            ?>
                    <a href="<?php echo app\components\Utilities::generateUrl($latest_events->EventUrl); ?>"> <?php echo Date('d, M Y > ', strtotime($latest_events->StartDate)); ?> <?php echo (Yii::$app->language == 'sw') ? $latest_events->EventTitleSw : $latest_events->EventTitleEn; ?></a>
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


