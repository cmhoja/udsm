
<?php
$title = Yii::$app->params['static_items']['news_events'][Yii::$app->language];
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
                    <a href = "#"><?php echo Yii::$app->params['static_items']['Connect'][Yii::$app->language]; ?></a>
                </li>
                <li class = "active"><?php echo $title; ?></li>
            </ul>
        </div>

    </div>
</div>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-12">
                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['recent_events'][Yii::$app->language] ?></h3>
                </div>
                <?php
                if (isset($events) && $events) {
                    foreach ($events as $event) {
                        ?>
                        <div class="row">
                            <div class=" col-md-12">
                                <h4><a href="<?php echo app\components\Utilities::generateUrl('/events/' . $event->EventUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $event->EventTitleSw : $event->EventTitleEn; ?></a></h4>
                                <div class="post-meta">

                                    <span class="time">
                                        <i class="fa fa-calendar"></i> <?php echo Date('D.M.Y ', strtotime($event->StartDate)); ?></span>
                                    <span class="time">
                                        <i class="fa fa-clock-o"></i> <?php echo Date('H.i', strtotime($event->StartDate)); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                }
                ?>


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
                            <a class="twitter-timeline" data-height="500" href="<?php echo \app\models\SocialMediaAccounts::getAccoutLinkByTypeAndUnitID(\app\models\SocialMediaAccounts::ACC_TYPE_TWITTER, \app\models\SocialMediaAccounts::STATUS_PUBLISHED, NULL); ?>"><?php echo Yii::$app->params['static_items']['tweets_by'][Yii::$app->language]; ?>  UdsmAlumni</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <div aria-labelledby="facebook-tab" id="facebook" class="tab-pane fade" role="tabpanel">
                            <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo \app\models\SocialMediaAccounts::getAccoutLinkByTypeAndUnitID(\app\models\SocialMediaAccounts::ACC_TYPE_FACEBOOK, \app\models\SocialMediaAccounts::STATUS_PUBLISHED, NULL); ?>&width=370&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=500" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:100%; height:500px; background: white; float:left; " allowtransparency="true"></iframe>
                        </div>

                    </div>
                </div><!-- /example -->




            </div>
            <div class="col-md-8 col-md-12">
                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['news'][Yii::$app->language]; ?></h3>
                </div>
                <?php
                if ($news) {
                    foreach ($news as $new) {
                        ?>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <?php
                                if ($new->Photo) {
                                    ?><div class="pull-left">
                                        <img src=" <?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $new->Photo; ?>" alt="" title="" />
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>

                            <div class="col-sm-8 col-md-8">
                                <h2 class="post-title">
                                    <a href="<?php echo app\components\Utilities::generateUrl('/connect/news/' . $new->LinkUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $new->TitleSw : $new->TitleEn; ?></a>
                                </h2>
                                <div class="post-meta">

                                    <span class="time">
                                        <i class="fa fa-calendar"></i> <?php echo Date('D.M.Y', strtotime($new->DatePosted)); ?></span>
                                </div>

                                <div class="post-content"><?php echo substr(((Yii::$app->language == 'sw') ? $new->DetailsSw : $new->DetailsEn), 0, 200); ?></div>

                                <a href="<?php echo app\components\Utilities::generateUrl('/connect/news/' . $new->LinkUrl); ?>" class="btn btn-default"><?php echo Yii::$app->params['static_items']['read_more'][Yii::$app->language]; ?></a>

                            </div>

                        </div>
                        <hr>
                        <?php
                    }
                }
                ?>

            </div>
        </div> 
    </div>

</section>


