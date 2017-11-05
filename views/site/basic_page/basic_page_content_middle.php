<?php if (isset($page_content_middle_blocks) && $page_content_middle_blocks) : ?>
    <!--<div class="container" style="border: 1px solid red;">-->
        <div class="row text-center">
            <?php
            foreach ($page_content_middle_blocks as $promotion_block) {
                ?>
                <div class="col-sm-2 col-md-2">
                    <a  target="<?php echo $promotion_block->LinkToPage ? '_blank' : '' ?>"href="<?php echo $promotion_block->LinkToPage ? \app\components\Utilities::generateUrl($promotion_block->LinkToPage) : ''; ?>">
                        <i class="fa  <?php echo $promotion_block->BlockIconCSSClass; ?> text-color fa-2x icons-circle"> </i>
                        <p><?php echo substr(((Yii::$app->language == 'sw') ? $promotion_block->BlockTitleSw : $promotion_block->BlockTitleEn), 0, 200); ?> </p>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    <!--</div>-->
<?php endif; ?>