<?php if ($content_bottom_column1 OR $content_bottom_column2 OR $content_bottom_column3 OR $content_bottom_column4): ?>
    <section class="page-section promotional-area">
        <div class="container who-we-are">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column1) && $content_bottom_column1) {
                        foreach ($content_bottom_column1 as $block1) {
                            if (!empty($block1->BlockIconPicture)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block1->LinkToPage); ?>" >
                                    <img class="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block1->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!$block1->BlockIconPicture && !empty($block1->BlockIconVideo)) {
                                ?>
                                <div class="">
                                    <?php echo $block1->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>

                            <h5>  
                                <?php
                                if ($block1->BlockIconCSSClass) {
                                    ?>
                                    <i class="<?php echo $block1->BlockIconCSSClass; ?>" aria-hidden="true"></i>
                                <?php }
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block1->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block1->BlockTitleSw : $block1->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block1->BlockDetailsSw : $block1->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column2) && $content_bottom_column2) {
                        foreach ($content_bottom_column2 as $block2) {
                            if (!empty($block2->BlockIconPicture)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block2->LinkToPage); ?>" >
                                    <img class="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block2->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } else if (!$block2->BlockIconPicture && !empty($block2->BlockIconVideo)) {
                                ?>
                                <div class="">
                                    <?php echo $block2->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>
                            <h5>
                                <?php
                                if (!empty($block2->BlockIconCSSClass)) {
                                    ?>
                                    <i class="<?php echo $block2->BlockIconCSSClass; ?>" aria-hidden="true"></i>
                                <?php } ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block2->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block2->BlockTitleSw : $block2->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block2->BlockDetailsSw : $block2->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?>            
                </div>

                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column3) && $content_bottom_column3) {
                        foreach ($content_bottom_column3 as $block3) {
                            if (!empty($block3->BlockIconPicture)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block3->LinkToPage); ?>" >
                                    <img class="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block3->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!$block3->BlockIconPicture && !empty($block3->BlockIconVideo)) {
                                ?>
                                <div class="">
                                    <?php echo $block3->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>
                            <h5>
                                <?php if ($block3->BlockIconCSSClass) {
                                    ?>
                                    <i class="<?php echo $block3->BlockIconCSSClass; ?>" aria-hidden="true"></i>
                                <?php } ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block3->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block3->BlockTitleSw : $block3->BlockTitleEn; ?></a>
                            </h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block3->BlockDetailsSw : $block3->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column4) && $content_bottom_column4) {
                        foreach ($content_bottom_column4 as $block4) {
                            if (!empty($block4->BlockIconPicture)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block4->LinkToPage); ?>" >
                                    <img class="" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block4->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!$block4->BlockIconPicture && !empty($block4->BlockIconVideo)) {
                                ?>
                                <div class="">
                                    <?php echo $block4->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>
                            <h5>
                                <?php if ($block4->BlockIconCSSClass) { ?>
                                    <i class="<?php echo $block4->BlockIconCSSClass; ?>" aria-hidden="true"></i>
                                    <?php
                                }
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block4->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block4->BlockTitleSw : $block4->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block4->BlockDetailsSw : $block4->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?> 
                </div>
            </div>
        </div>

    </section>
<?php endif; ?>