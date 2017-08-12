
<section id="testimonials" class="page-section testimonails">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title text-left">
                    <!-- Heading -->
                    <h2 class="title"><?php echo strtoupper(Yii::$app->params['static_items']['news'][Yii::$app->language]); ?></h2>
                </div>
                <?php if (isset($home_content_middle_left_news) && $home_content_middle_left_news): ?>
                    <ul class="latest-posts">

                        <?php foreach ($home_content_middle_left_news as $news) { ?>
                            <li>
                                <div class="post-thumb">
                                    <img class="img-rounded" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $news->Photo; ?>" alt="" title="" width="84" height="84">
                                </div>
                                <div class="post-details">
                                    <div class="description">
                                        <a href="<?php echo app\components\Utilities::generateUrl('/college/' . $this->params['unit_abbreviation_code'] . '/news/'.$news->LinkUrl) ?>">
                                            <?php echo (Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn ?>
                                        </a>
                                    </div>
                                    <div class="meta">
                                        <!-- Meta Date -->
                                        <span class="time">
                                            <i class="fa fa-calendar"></i> <?php echo Date('d.M.Y', strtotime($news->DatePosted)); ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                    <hr>
                    <a href="<?php echo app\components\Utilities::generateUrl('/college/' . $this->params['unit_abbreviation_code'] . '/news') ?>"><?php echo Yii::$app->params['static_items']['view_all'][Yii::$app->language]; ?></a>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <?php
                if (isset($home_content_middle_right_blocks) && $home_content_middle_right_blocks) {
                    foreach ($home_content_middle_right_blocks as $block) {
                        ?>
                        <div class="section-title text-left">
                            <!-- Heading -->
                            <h2 class="title"><?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn; ?></h2>
                        </div>
                        <?php if (isset($block->BlockIconPicture) && $block->BlockIconPicture): ?>
                            <a href="<?php echo app\components\Utilities::generateUrl($block->LinkToPage) ?>"><img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_units_site'] . '/' . $block->BlockIconPicture; ?>"></a>
                        <?php endif; ?>

                        <?php if (!$block->BlockIconVideo && $block->BlockIconVideo): ?>
                            <div style="padding: 1%">
                                <?php echo $block->BlockIconVideo; ?>
                            </div>
                        <?php endif; ?>

                        <h5 class=""><a href="<?php echo app\components\Utilities::generateUrl($block->LinkToPage) ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block->BlockTitleSw : $block->BlockTitleEn; ?></a></h5>
                        <p><?php echo substr((Yii::$app->language == 'sw') ? $block->BlockDetailsSw : $block->BlockDetailsEn, 0, 200); ?></p>

                        <?php
                    }
                }
                ?>
            </div>    
        </div>

    </div>
</section>