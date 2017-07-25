<section id="testimonials" class="page-section testimonails">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($news)) {
                    ?>
                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"><i class="fa fa-newspaper-o"></i> <?php echo Yii::$app->params['static_items']['news'][Yii::$app->language]; ?></h3>
                    </div>
                    <div class="owl-carousel pagination-1 dark-switch text-left" data-pagination="true" data-autoplay="false" data-navigation="true" data-items="4">
                        <?php foreach ($news as $news) {
                            ?>
                            <div class="item">
                                <?php if ($news->Photo) {
                                    ?>
                                    <div class="client-image">
                                        <a href="<?php echo yii\helpers\Url::toRoute('news/' . $news->LinkUrl); ?>">
                                            <img class="img-rounded" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $news->Photo; ?>"  alt="" />
                                        </a>
                                    </div>
                                    <a href="<?php echo yii\helpers\Url::toRoute('news/' . $news->LinkUrl); ?>"><h4><?php echo substr((Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn, 0, 60); ?></h4></a>
                                    <p><?php //echo substr((Yii::$app->language == 'sw') ? $news->DetailsSw : $news->DetailsEn, 0, 125) . ' ...';   ?></p>
                                <?php } else {
                                    ?>
                                    <div class="client-image">
                                    </div>
                                    <a href="<?php echo yii\helpers\Url::toRoute('news/' . $news->LinkUrl); ?>"><h4><?php echo substr((Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn, 0, 60); ?></h4></a>
                                    <a href="<?php echo yii\helpers\Url::toRoute('news/' . $news->LinkUrl); ?>">
                                        <p style="color: black"><?php echo substr((Yii::$app->language == 'sw') ? $news->DetailsSw : $news->DetailsEn, 0, 300) . ' ...'; ?></p>
                                    </a>
                                <?php }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
</section>