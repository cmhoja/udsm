
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

            <!--                <div class="col-md-12">
                                <div class="section-title">
                                     Heading 
                                    <h3 class="title">Search Announcements</h3>
                                </div>
                            </div>-->


            <!--                <div class="form-group">
                                <label for="dtp_input1" class="col-md-2 control-label">Enter Keyword </label>
                                <div class="input-group col-md-5" data-link-field="dtp_input1">
                                    <input class="form-control" size="16" type="text" value="" readonly>
                                </div>
                                <input type="hidden" id="dtp_input1" value="" /><br/>
                            </div>
                            <div class="form-group">
                                <label for="dtp_input1" class="col-md-2 control-label">Select Date & Time </label>
                                <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input class="form-control" size="16" type="text" value="" readonly>
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="hidden" id="dtp_input1" value="" /><br/>
                            </div>
                            <div class="col-md-12 pad-20">
                                <a href="#" class="btn btn-default">Search</a>
                            </div>-->

            <br/>

            <?php
            foreach ($announcements as $announcement) {
                ?>
                <div class="row">
                    <div class="col-sm-8 col-md-10">
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

            <!--
                        <div class="row">
            
            
                            <div class="col-sm-8 col-md-10">
                                <h2 class="post-title">
                                    <a href="announcement-details.html">Announcement Title</a>
                                </h2>
                                <div class="post-meta">
            
                                    <span class="time">
                                        <i class="fa fa-calendar"></i> 03.11.2014</span>
                                    <span class="time">
                                        <i class="fa fa-clock-o"></i> 14.28</span>
                                </div>
            
                                <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
            
                                <a href="announcement-details.html" class="btn btn-default">Read More</a>
            
                            </div>
            
            
            
                        </div>
                        <hr>-->

        </div> 

    </section>


<?php } ?>

