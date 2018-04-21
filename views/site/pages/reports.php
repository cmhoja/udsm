
<?php
if (isset($page_content) && $page_content) {
    $title = Yii::$app->params['static_items']['annual_reports'][Yii::$app->language];
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
                        <a href = "#"><?php echo Yii::$app->params['static_items']['aboutus'][Yii::$app->language]; ?></a>
                    </li>
                    <li class = "active"><?php echo $title; ?></li>
                </ul>
            </div>

        </div>
    </div>



    <section class="page-section">
        <div class="container">
            <?php
            foreach ($page_content as $content) {
                ?>
                <div class="row">
                    <div class="col-sm-8 col-md-10">
                        <h2 class="post-title">
                            <a href="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $content->Attachment; ?>"  download><?php echo (Yii::$app->language == 'sw') ? $content->DocumentNameSw : $content->DocumentNameEn ?></a>
                        </h2>
                        <div class="post-meta">
                            <span class="time">
                                <i class="fa fa-calendar"></i><?php echo Date('d.M.Y', strtotime($content->DatePublished)); ?></span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($content->DatePublished)); ?></span>
                        </div>

                    </div>
                </div>
                <hr>
                <?php
            }
            ?>
        </div> 

    </section>


<?php } ?>

