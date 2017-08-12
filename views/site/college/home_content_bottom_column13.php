<section id="testimonials" class="page-section testimonails">
    <div class="container">
        <div class="row">
            <!--CONTENT BOTTOM COLUMN 1-->
            <?php
            if (isset($home_content_bottom_column1) && $home_content_bottom_column1) {
                foreach ($home_content_bottom_column1 as $content_column1) {
                    ?>
                    <div class="col-md-4">
                        <?php
                        if ($content_column1->BlockIconPicture) {
                            ?> 
                            <a href="<?php echo app\components\Utilities::generateUrl($content_column1->LinkToPage) ?>" ><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/bottom.jpg"></a>
                            <?php
                        }
                        ?>
                        <h5><a href="<?php echo app\components\Utilities::generateUrl($content_column1->LinkToPage) ?>"><?php echo (Yii::$app->language == 'sw') ? $content_column1->BlockTitleSw : $content_column1->BlockTitleEn; ?></a></h5>
                        <p><?php echo substr((Yii::$app->language == 'sw') ? $content_column1->BlockDetailsSw : $content_column1->BlockDetailsEn, 0, 170); ?></p>
                        <a href="<?php echo app\components\Utilities::generateUrl($content_column1->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                    </div>
                    <?php
                }
            }
            ?>

            <!--CONTENT BOTTOM COLUMN 2-->
            <?php
            if (isset($home_content_bottom_column2) && $home_content_bottom_column2) {
                foreach ($home_content_bottom_column2 as $content_column2) {
                    ?>
                    <div class="col-md-4">
                        <?php
                        if ($content_column2->BlockIconPicture) {
                            ?> 
                            <a href="<?php echo app\components\Utilities::generateUrl($content_column2->LinkToPage) ?>" ><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/bottom.jpg"></a>
                            <?php
                        }
                        ?>
                        <h5><a href="<?php echo app\components\Utilities::generateUrl($content_column2->LinkToPage) ?>"><?php echo (Yii::$app->language == 'sw') ? $content_column2->BlockTitleSw : $content_column2->BlockTitleEn; ?></a></h5>
                        <p class="text-justify"><?php echo substr((Yii::$app->language == 'sw') ? $content_column2->BlockDetailsSw : $content_column2->BlockDetailsEn, 0, 170); ?></p>
                        <a href="<?php echo app\components\Utilities::generateUrl($content_column2->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                    </div>
                    <?php
                }
            }
            ?>

            <!--CONTENT BOTTOM COLUMN 3-->
            <?php
            if (isset($home_content_bottom_column3) && $home_content_bottom_column3) {
                foreach ($home_content_bottom_column3 as $content_column3) {
                    ?>
                    <div class="col-md-4">
                        <?php
                        if ($content_column3->BlockIconPicture) {
                            ?> 
                            <a href="<?php echo app\components\Utilities::generateUrl($content_column3->LinkToPage) ?>" ><img src="<?php echo $this->theme->baseUrl; ?>/layouts/college/img/bottom.jpg"></a>
                            <?php
                        }
                        ?>
                        <h5><a href="<?php echo app\components\Utilities::generateUrl($content_column3->LinkToPage) ?>"><?php echo (Yii::$app->language == 'sw') ? $content_column3->BlockTitleSw : $content_column3->BlockTitleEn; ?></a></h5>
                        <p class="text-justify"><?php echo substr((Yii::$app->language == 'sw') ? $content_column3->BlockDetailsSw : $content_column3->BlockDetailsEn, 0, 170); ?></p>
                        <a href="<?php echo app\components\Utilities::generateUrl($content_column3->LinkToPage) ?>" class="btn-transparent"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>