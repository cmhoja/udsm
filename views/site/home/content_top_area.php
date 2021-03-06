<section id="who-we-are" class="page-section no-pad light-bg border-tb">
    <div class="container who-we-are">
        <div class="row">
            <!--EVENTS AREA OR MAIN_TEMPLATE_CONTENT_TOP_LEFT-->
            <div class="col-md-4">
                <h3 class="title"><i class="fa fa-calendar"></i> <?php echo Yii::$app->params['static_items']['recently_events'][Yii::$app->language]; ?></h3>   
                <?php
                if (isset($events) && $events) {
                    ?>
                    <?php
                    foreach ($events as $event) {
                        $date = explode('-', date('d-M-Y', strtotime($event->StartDate)));
                        ?>
                        <div class="row events">
                            <div class="col-xs-2 pad-5">
                                <div class="event-holder">
                                    <span class="date"><?php echo $date[0]; ?></span>
                                    <span class="month"><?php echo $date[1]; ?></span>
                                    <span class="year"><?php echo $date[2]; ?></span>
                                </div>
                            </div>
                            <div class="col-xs-10 pad-10">
                                <div class="event-home">
                                    <a href="<?php echo \app\components\Utilities::generateUrl($event->EventUrl); ?>"><p class="event-title"><?php echo html_entity_decode((Yii::$app->language == 'sw') ? $event->EventTitleEn : $event->EventTitleSw); ?></p></a>
                                </div>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row events">
                        <a href="<?php echo \app\components\Utilities::generateUrl('/events'); ?>"><?php echo Yii::$app->params['static_items']['view_all_events'][Yii::$app->language]; ?></a>
                    </div>
                    <?php
                } else {
                    echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                }
                ?>
            </div>

            <!--ANNOUNCEMENT AREA OR MAIN_TEMPLATE_CONTENT_TOP_CENTRE-->
            <div class="col-md-4 announcements">
                <h3 class="title"><i class="fa fa-bullhorn"></i><?php echo Yii::$app->params['static_items']['announcement'][Yii::$app->language]; ?></h3>
                <?php
                if (isset($announcements) && $announcements) {

                    foreach ($announcements as $announcement) {
                        $date = explode(' ', Date('d.m.Y H:i:s', strtotime($announcement->DatePosted)));
                        ?>
                        <li>
                            <a href="<?php echo \app\components\Utilities::generateUrl($announcement->LinkUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $announcement->TitleSw : $announcement->TitleEn; ?>....</a>
                            <div class="post-meta">
                                <span class="time">
                                    <i class="fa fa-calendar"></i> <?php echo $date[0]; ?></span>
                                <span class="time">
                                    <i class="fa fa-clock-o"></i><?php echo $date[1]; ?></span>
                            </div>
                        </li>
                        <hr>

                    <?php } ?>
                    <div class="col-md-12 events no-pad pad-5">
                        <a href="<?php echo \app\components\Utilities::generateUrl('/announcements'); ?>"><?php echo Yii::$app->params['static_items']['view_all_announcement'][Yii::$app->language]; ?></a>
                    </div>
                    <?php
                } else {
                    echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                }
                ?>


            </div>

            <!--MAIN_TEMPLATE_CONTENT_TOP_CENTRE-->
            <div class="col-md-4">
                <?php
                if (isset($content_right_blocks) && $content_right_blocks) {
                    foreach ($content_right_blocks as $block) {
                        if ($block->BlockTitleSw || $block->BlockTitleEn) {
                            $IconClass = yii\helpers\Html::decode($block->BlockIconCSSClass);
                            ?>
                            <div class="text-left">
                                <h3 class="title">
                                    <?php if (!empty($IconClass)) { ?>
                                        <i class="<?php echo $IconClass; ?>" aria-hidden="true" ></i>
                                    <?php } ?>
                                    <?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn; ?>
                                </h3>
                            </div>
                        <?php } ?>
                        <div class="royal-bg">
                            <?php
                            if (!empty($block->BlockIconPicture)) {
                                ?>
                                <img class="" src="<?php echo $this->theme->baseUrl . '/' . Yii::$app()->params['file_upload_main_site'] . '/' . $block->BlockIconPicture; ?>">
                                <?php
                            } elseif (empty($block->BlockIconVideo) && !empty($block->BlockIconVideo)) {
                                ?>
                                <div class="">
                                    <?php echo $block->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>                            
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block->BlockDetailsSw : $block->BlockDetailsEn), 0, 500); ?></p>
                            <?php if ($block->LinkToPage): ?>
                                <a class="btn btn-small btn-success" href="<?php echo \app\components\Utilities::generateUrl($block->LinkToPage); ?>" role="button"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language] ?></a>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
