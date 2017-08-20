<?php
$title = Yii::$app->params['static_items']['student_corner'][Yii::$app->language];

//var_dump($page_content);
?>
<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo $title; ?> </h1>
            <ul class = "breadcrumb">
                <li>
                    <a href = "<?php echo yii\helpers\Url::home(); ?>"><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?></a>
                </li>
                <li>
                    <a href = "#"><?php echo Yii::$app->params['static_items']['page'][Yii::$app->language]; ?></a>
                </li>
                <li class = "active"><?php echo $title; ?></li>
            </ul>
        </div>

    </div>
</div>
<?php
if (isset($page_content) && $page_content) {
    ?>
    <section class="page-section">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-12 pull-right">
                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"><?php echo Yii::$app->params['static_items']['education'][Yii::$app->language]; ?></h3>
                    </div>

                    <div class="row">
                        <?php
                        if (isset($page_content['top_blocks']) && $page_content['top_blocks']) {
                            foreach ($page_content['top_blocks'] as $top_blocks) {
                                $IconClass = $top_blocks->BlockIconCSSClass;
                                ?>

                                <div class="col-md-4">
                                    <?php if (!empty($IconClass) && empty($top_blocks->BlockIconPicture) && empty($top_blocks->BlockIconVideo)) { ?>
                                        <i class="<?php echo $IconClass; ?>"></i>
                                        <?php
                                    } else if (!empty($top_blocks->BlockIconPicture) && !empty($top_blocks->BlockIconVideo) && !empty($top_blocks->BlockIconCSSClass)) {
                                        ?>
                                        <a href="<?php echo \app\components\Utilities::generateUrl($top_blocks->LinkToPage); ?>" >
                                            <img class="<?php echo $IconClass; ?>" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $top_blocks->BlockIconPicture; ?>">
                                        </a>
                                        <?php
                                    } elseif (!empty($top_blocks->BlockIconVideo)) {
                                        ?>
                                        <div class="<?php echo $IconClass; ?>">
                                            <?php echo $top_blocks->BlockIconVideo ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <h5><a href="<?php echo \app\components\Utilities::generateUrl($top_blocks->LinkToPage); ?>" class="promotions"><?php echo (Yii::$app->language == 'sw') ? $top_blocks->BlockTitleSw : $top_blocks->BlockTitleEn; ?></a></h5>
                                    <p><?php echo substr(((Yii::$app->language == 'sw') ? $top_blocks->BlockDetailsSw : $top_blocks->BlockDetailsEn), 0, 200); ?></p>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>

                    <?php if (isset($page_content['campus_life']) && $page_content['campus_life']): ?>
                        <div class="section-title">
                            <!-- Heading -->
                            <h3 class="title"><?php echo Yii::$app->params['static_items']['campus_life'][Yii::$app->language]; ?></h3>
                        </div>
                        <div class="row text-center top-pad-30">
                            <?php
                            foreach ($page_content['campus_life'] as $campus_life) {
                                ?>
                                <div class="col-sm-4 col-md-4">
                                    <i class="fa <?php echo $campus_life->BlockIconCSSClass; ?> medium text-color fa-2x icons-circle border-color"></i>
                                    <a href="<?php echo \app\components\Utilities::generateUrl($campus_life->LinkToPage); ?>"><h5><?php echo (Yii::$app->language == 'sw') ? $campus_life->BlockTitleSw : $campus_life->BlockTitleEn; ?></h5></a>
                                    <p><?php echo substr(((Yii::$app->language == 'sw') ? $campus_life->BlockDetailsSw : $campus_life->BlockDetailsEn), 0, 200); ?></p>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    <?php endif; ?>


                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"><?php echo Yii::$app->params['static_items']['news'][Yii::$app->language]; ?></h3>
                    </div>

                    <?php
                    if (isset($page_content['latest_news']) && $page_content['latest_news']) {
                        foreach ($page_content['latest_news'] as $news) {
                            ?>
                            <div class="row">
                                <?php
                                $class = 'col-md-12';
                                if ($news->Photo):
                                    $class = 'col-md-8';
                                    ?>
                                    <div class="col-sm-4 col-md-4">

                                        <div class="pull-left">
                                            <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $news->Photo; ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="col-sm-8 <?php echo $class; ?>">
                                    <h2 class="post-title">
                                        <a href="<?php echo \app\components\Utilities::generateUrl('/news/' . $news->LinkUrl) ?>"><?php echo (Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn; ?></a>
                                    </h2>
                                    <div class="post-meta">

                                        <span class="time">
                                            <i class="fa fa-calendar"></i> <?php echo Date('d.M.Y', strtotime($news->DatePosted)); ?></span>
                                    </div>

                                    <div class="post-content"> <?php echo substr(((Yii::$app->language == 'sw') ? $news->DetailsSw : $news->DetailsEn), 0, 170); ?> </div>

                                    <a href="<?php echo \app\components\Utilities::generateUrl('/news/' . $news->LinkUrl) ?>" class="btn btn-default btn-sm"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>
                                </div>

                            </div>
                            <hr>
                            <?php
                        }
                    }
                    ?>

                </div>

                <div class="col-md-4 col-md-12">
                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"><?php echo Yii::$app->params['static_items']['quick_links'][Yii::$app->language]; ?></h3>
                    </div>
                    <div id="sidebar" class="sidebar">
                        <div class="widget">
                            <div id="MainMenu">
                                <div class="list-group panel">
                                    <?php
                                    if (isset($page_content['quick_links']) && $page_content['quick_links']) {
                                        foreach ($page_content['quick_links'] as $quick_links) {
                                            ?>
                                            <a href="<?php echo \app\components\Utilities::generateUrl($quick_links->LinkUrl) ?>" class="list-group-item main-item"><?php echo (Yii::$app->language == 'sw') ? $quick_links->ItemNameSw : $quick_links->ItemNameEn; ?></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- page-list -->
                        </div>
                    </div>


                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"><?php echo Yii::$app->params['static_items']['Upcoming_events'][Yii::$app->language]; ?></h3>
                    </div>
                    <?php
                    if (isset($page_content['latest_events']) && $page_content['latest_events']) {
                        foreach ($page_content['latest_events'] as $latest_events) {
                            ?> 
                            <div class="row">
                                <div class=" col-md-12">
                                    <h4><a href="<?php echo \app\components\Utilities::generateUrl($latest_events->EventUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $latest_events->EventTitleSw : $evacuant->EventTitleEn; ?> </a></h4>
                                    <div class="post-meta">
                                        <span class="time">
                                            <i class="fa fa-calendar"></i><?php echo Date('d.M.Y', strtotime($latest_events->StartDate)); ?></span>
                                        <span class="time">
                                            <i class="fa fa-clock-o"></i><?php echo Date('H.i.s', strtotime($latest_events->StartDate)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php
                        }
                    }
                    ?>



                    <!--                    <div class="section-title">
                                             Heading 
                                            <h3 class="title">Academic Units</h3>
                                        </div>-->

                    <!--                    <div id="sidebar" class="sidebar">
                                            <div class="widget">
                    
                                                <div id="MainMenu">
                                                    <div class="list-group panel">
                    
                    
                    
                                                        <a href="#" class="list-group-item main-item">CoET</a>
                                                        <a href="#" class="list-group-item main-item">CoICT</a>
                                                        <a href="#" class="list-group-item main-item">Law</a>
                                                        <a href="#" class="list-group-item main-item">Education</a>
                    
                                                    </div>
                                                </div>
                                                 page-list 
                                            </div>
                                        </div>-->

                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"><?php echo Yii::$app->params['static_items']['social_media'][Yii::$app->language]; ?></h3>
                    </div>

                    <div data-example-id="togglable-tabs" role="tabpanel" class="bs-example-tabs">
                        <ul role="tablist" class="nav nav-tabs" id="myTab">
                            <li class="active" role="presentation"><a aria-expanded="true" aria-controls="twitter" data-toggle="tab" role="tab" id="twitter-tab" href="#twitter"><i class= "fa fa-twitter"></i> <?php echo Yii::$app->params['static_items']['twitter'][Yii::$app->language]; ?></a></li>
                            <li role="presentation"><a aria-controls="facebook" data-toggle="tab" id="facebook-tab" role="tab" href="#facebook">
                                    <i class= "fa fa-facebook-square"></i> <?php echo Yii::$app->params['static_items']['facebook'][Yii::$app->language]; ?></a></li>

                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div aria-labelledby="twitter-tab" id="twitter" class="tab-pane fade in active" role="tabpanel">
                                <a class="twitter-timeline" data-height="700" href="<?php echo \app\models\SocialMediaAccounts::getAccoutLinkByTypeAndUnitID(\app\models\SocialMediaAccounts::ACC_TYPE_TWITTER, \app\models\SocialMediaAccounts::STATUS_PUBLISHED, NULL); ?>"><?php echo Yii::$app->params['static_items']['tweets_by'][Yii::$app->language]; ?></a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                            <div aria-labelledby="facebook-tab" id="facebook" class="tab-pane fade" role="tabpanel">

                                <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo \app\models\SocialMediaAccounts::getAccoutLinkByTypeAndUnitID(\app\models\SocialMediaAccounts::ACC_TYPE_FACEBOOK, \app\models\SocialMediaAccounts::STATUS_PUBLISHED, NULL); ?>&width=370&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=700" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:100%; height:700px; background: white; float:left; " allowtransparency="true"></iframe>

                            </div>

                        </div>
                    </div><!-- /example -->


                </div>
            </div> 
        </div>

    </section>



<?php } ?>




