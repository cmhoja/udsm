<?php if ($content_bottom_column1 OR $content_bottom_column2 OR $content_bottom_column3 OR $content_bottom_column4): ?>
    <section class="page-section promotional-area">
        <div class="container who-we-are">
            <div class="row">
                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column1) && $content_bottom_column1) {
                        foreach ($content_bottom_column1 as $block1) {
                            $IconClass = $block1->BlockIconCSSClass;
                            ?>
                            <?php if (!empty($IconClass) && empty($block1->BlockIconPicture) && empty($block1->BlockIconVideo)) { ?>
                                <i class="<?php echo $IconClass; ?>"></i>
                                <?php
                            } else if (!empty($block1->BlockIconPicture) && !empty($block1->BlockIconVideo) && !empty($block1->BlockIconCSSClass)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block1->LinkToPage); ?>" >
                                    <img class="<?php echo $IconClass; ?>" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block1->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!empty($block1->BlockIconVideo)) {
                                ?>
                                <div class="<?php echo $IconClass; ?>">
                                    <?php echo $block1->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>

                            <h5><a href="<?php echo \app\components\Utilities::generateUrl($block1->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block1->BlockTitleSw : $block1->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block1->BlockDetailsSw : $block1->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?>

                        <!--                <a href="#" ><img src="<?php //echo $this->theme->baseUrl;              ?>/img/ud3.jpg"></a>
                                        <h5><a href="#" class="promotions">Undergraduate</a></h5>
                                        <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>-->

                </div>

                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column2) && $content_bottom_column2) {
                        foreach ($content_bottom_column2 as $block2) {
                            $IconClass = $block2->BlockIconCSSClass;
                            ?>
                            <?php if (!empty($IconClass) && empty($block2->BlockIconPicture) && empty($block2->BlockIconVideo)) { ?>
                                <i class="<?php echo $IconClass; ?>"></i>
                                <?php
                            } else if (!empty($block2->BlockIconPicture) && empty($block2->BlockIconVideo) && empty($block2->BlockIconCSSClass)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block2->LinkToPage); ?>" >
                                    <img class="<?php echo $IconClass; ?>" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block2->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!empty($block2->BlockIconVideo)) {
                                ?>
                                <div class="<?php echo $IconClass; ?>">
                                    <?php echo $block2->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>

                            <h5><a href="<?php echo \app\components\Utilities::generateUrl($block2->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block2->BlockTitleSw : $block2->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block2->BlockDetailsSw : $block2->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?>            
                    <!--                <a href="#" >
                                        <img src="<?php //echo $this->theme->baseUrl;          ?>/img/ud8.jpg">
                                    </a>
                                    <h5><a href="#" class="promotions">Postgraduate</a></h5>
                                    <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>-->
                </div>

                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column3) && $content_bottom_column3) {
                        foreach ($content_bottom_column3 as $block3) {
                            $IconClass = $block3->BlockIconCSSClass;
                            ?>
                            <?php if (!empty($IconClass) && empty($block3->BlockIconPicture) && empty($block3->BlockIconVideo)) { ?>
                                <i class="<?php echo $IconClass; ?>"></i>
                                <?php
                            } else if (!empty($block3->BlockIconPicture) && empty($block3->BlockIconVideo) && empty($block3->BlockIconCSSClass)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block3->LinkToPage); ?>" >
                                    <img class="<?php echo $IconClass; ?>" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block3->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!empty($block3->BlockIconVideo)) {
                                ?>
                                <div class="<?php echo $IconClass; ?>">
                                    <?php echo $block3->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>

                            <h5><a href="<?php echo \app\components\Utilities::generateUrl($block3->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block3->BlockTitleSw : $block3->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block3->BlockDetailsSw : $block3->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?> 
    <!--                <a href="#" ><img src="<?php //echo $this->theme->baseUrl;          ?>/img/ud5.jpg"></a>
    <h5><a href="#" class="promotions">International Students</a></h5>
    <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>-->
                </div>

                <div class="col-md-3">
                    <?php
                    if (isset($content_bottom_column4) && $content_bottom_column4) {
                        foreach ($content_bottom_column4 as $block4) {
                            $IconClass = $block4->BlockIconCSSClass;
                            ?>
                            <?php if (!empty($IconClass) && empty($block4->BlockIconPicture) && empty($block4->BlockIconVideo)) { ?>
                                <i class="<?php echo $IconClass; ?>"></i>
                                <?php
                            } else if (!empty($block4->BlockIconPicture) && empty($block4->BlockIconVideo) && empty($block4->BlockIconCSSClass)) {
                                ?>
                                <a href="<?php echo \app\components\Utilities::generateUrl($block4->LinkToPage); ?>" >
                                    <img class="<?php echo $IconClass; ?>" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $block4->BlockIconPicture; ?>">
                                </a>
                                <?php
                            } elseif (!empty($block4->BlockIconVideo)) {
                                ?>
                                <div class="<?php echo $IconClass; ?>">
                                    <?php echo $block4->BlockIconVideo ?>
                                </div>
                                <?php
                            }
                            ?>

                            <h5><a href="<?php echo \app\components\Utilities::generateUrl($block4->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $block4->BlockTitleSw : $block4->BlockTitleEn; ?></a></h5>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $block4->BlockDetailsSw : $block4->BlockDetailsEn), 0, 200); ?></p>
                            <?php
                        }
                    }
                    ?> 
    <!--                <a href="#" ><img src="<?php //echo $this->theme->baseUrl;          ?>/img/ud2.jpg"></a>
    <h5><a href="#" class="promotions">Continuing Education</a></h5>
    <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>-->
                </div>
            </div>


        </div>

    </section>
<?php endif; ?>