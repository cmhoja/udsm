
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
            <br/>
            <?php
            foreach ($events as $events) {
                ?>
                <div class="row">
                    <div class="col-sm-8 col-md-10">
                        <h2 class="post-title">
                            <a href="<?php echo app\components\Utilities::generateUrl($events->EventUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $events->EventTitleSw : $events->EventTitleEn ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="time">
                                <i class="fa fa-calendar"></i><?php echo Date('d.M.Y', strtotime($events->DatePosted)); ?></span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($events->DatePosted)); ?></span>
                        </div>

                        <div class="post-content"><?php echo substr((Yii::$app->language == 'sw' ? $events->DescriptionSw : $events->DescriptionEn), 0, 200); ?></div>

                        <a href="<?php echo app\components\Utilities::generateUrl($events->EventUrl) ?>" class="btn btn-default"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language] ?></a>

                    </div>
                </div>
                <hr>
                <?php
            }
            ?>
        </div> 

    </section>


<?php } ?>

