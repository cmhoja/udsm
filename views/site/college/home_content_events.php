
<section id="events" class="page-section no-pad light-bg border-tb">
    <?php if (isset($home_content_events) && $home_content_events): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <!-- Heading -->
                        <h2 class="title"><?php echo Yii::$app->params['static_items']['events'][Yii::$app->language]; ?></h2>
                    </div>
                    <div class="owl-carousel pagination-1 dark-switch text-center" data-pagination="true" data-autoplay="true" data-navigation="false" data-items="3" data-animation="fadeInUp">
                        <?php foreach ($home_content_events as $event) { ?>
                            <div class="item col-md-6 col-sm-6">
                                <div class="client-box text-left">
                                    <div class="client-image">
                                        <div class="calenderitem">
                                            <div class="date color2">
                                                <div class="text-center">
                                                    <?php
                                                    $date = explode('/', Date('d/M/Y', strtotime($event->StartDate)));
                                                    echo $date[0] . '<br>' . $date[1]; // . '<br>' . $date[2];
                                                    ?>
                                                </div>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="client-details">
                                        <!-- Name -->
                                        <strong class="text-color"><?php echo (Yii::$app->language == 'sw') ? $event->EventTitleSw : $event->EventTitleEn; ?></strong> 

                                    </div>
                                    <p>
                                        <?php echo substr((Yii::$app->language == 'sw') ? $event->DescriptionSw : $event->DescriptionEn, 0, 150); ?>
                                    </p>
                                    <a href="<?php echo app\components\Utilities::generateUrl($event->EventUrl); ?>"> <?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>



            </div>
        </div>
    <?php endif; ?>
</section>
