<?php if (isset($content_footer_top_area) && $content_footer_top_area) : ?>
    <div id="get-quote" class="bg-color get-a-quote white text-center">
        <div class="container">
            <div class="row text-center">
                <?php
                foreach ($content_footer_top_area as $promotion_block) {
                    ?>
                    <div class="col-sm-2 col-md-2">
                        <a href="<?php echo \app\components\Utilities::generateUrl($promotion_block->LinkToPage); ?>"><i class="fa  <?php echo $promotion_block->BlockIconCSSClass; ?> text-color fa-2x icons-circle"></i>
                            <p><?php echo substr(((Yii::$app->language == 'sw') ? $promotion_block->BlockTitleSw : $promotion_block->BlockTitleEn), 0, 200); ?> </p>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>