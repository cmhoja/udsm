<?php
$title = Yii::$app->params['static_items']['staff_corner'][Yii::$app->language];
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
<section class="page-section">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-12 pull-right">
                <!--                <div class="section-title">
                                     Heading 
                                    <h3 class="title"><?php //echo Yii::$app->params['static_items']['staff_directory'][Yii::$app->language];                                                     ?></h3>
                
                
                                </div>
                
                                <form class="form-inline">
                                    <div class="form-group">
                
                                        <input type="text" class="form-control" d="exampleKeyword" placeholder="Search Keyword">
                                    </div>
                                    <div class="form-group">
                
                                        <select class="form-control" >
                                            <option value="field1">Select Department</option>
                                            <option value="field2">Information Technology</option>
                                            <option value="field3">Engineering</option>
                                            <option value="field4">Education</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-default btn-sm form-control" href="staff-details.html">Search Staff</a>
                                    </div>
                                </form>-->



                <br>
                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['staff_news'][Yii::$app->language]; ?></h3>
                </div>
                <div class="row">
                    <?php
                    if (isset($page_content['latest_news']) && $page_content['latest_news']) {
                        foreach ($page_content['latest_news'] as $news) {
                            ?>
                            <div class="row">
                                <?php if ($news->Photo) { ?>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="pull-left">
                                            <img src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $news->Photo ?>" alt="" title="" />
                                        </div>
                                    </div>
                                    <?php
                                    $class = 'col-sm-8 col-md-8';
                                } else {
                                    $class = 'col-sm-8 col-md-12';
                                }
                                ?>

                                <div class="<?php echo $class; ?>">
                                    <h2 class="post-title">
                                        <a href="<?php echo app\components\Utilities::generateUrl('/news/' . $news->LinkUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $news->TitleSw : $news->TitleEn; ?></a>
                                    </h2>
                                    <div class="post-meta">

                                        <span class="time">
                                            <i class="fa fa-calendar"></i> <?php echo Date('d.M.Y', strtotime($news->DatePosted)); ?></span>
                                    </div>
                                    <div class="post-content"> <?php echo substr(((Yii::$app->language == 'sw') ? $news->DetailsSw : $news->DetailsEn), 0, 180); ?> </div>

                                    <a href="<?php echo app\components\Utilities::generateUrl('/news/' . $news->LinkUrl); ?>" class="btn btn-default btn-sm" style="float: right;">Read More</a>

                                </div>

                            </div>
                            <hr>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4 col-md-12">

                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['staff_announcement'][Yii::$app->language]; ?></h3>

                </div>

                <?php
                if (isset($page_content['latest_announcements']) && $page_content['latest_announcements']) {
                    foreach ($page_content['latest_announcements'] as $announcements) {
                        ?>
                        <li>
                            <a href="<?php echo app\components\Utilities::generateUrl('/announcement/' . $announcements->LinkUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $announcements->TitleSw : $announcements->TitleEn ?></a>
                            <div class="post-meta">

                                <span class="time">
                                    <i class="fa fa-calendar"></i> <?php echo Date('d.M.Y', strtotime($announcements->DatePosted)); ?></span>
                                <span class="time">
                                    <i class="fa fa-clock-o"></i> <?php echo Date('H.i.s', strtotime($announcements->DatePosted)); ?></span>
                            </div>
                        </li>
                        <hr>
                        <?php
                    }
                } else {
                    ?>
                    <li>
                        <div class="post-meta">
                            <?php echo Yii::$app->params['static_items']['no_details'][Yii::$app->language]; ?>
                        </div>
                    </li>
                    <hr>
                    <?php
                }
                ?>

                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['staff_events'][Yii::$app->language]; ?></h3>
                </div>
                <?php
                if (isset($page_content['latest_events']) && $page_content['latest_events']) {
                    foreach ($page_content['latest_events'] as $events) {
                        ?>
                        <div class="row">
                            <div class=" col-md-12">
                                <h4><a href="<?php echo app\components\Utilities::generateUrl('/events/' . $events->EventUrl); ?>"><?php echo (Yii::$app->language == 'sw') ? $events->EventTitleSw : $events->EventTitleEn ?></a></h4>
                                <div class="post-meta">

                                    <span class="time">
                                        <i class="fa fa-calendar"></i> <?php echo Date('d.M.Y', strtotime($events->DatePosted)); ?>
                                    </span>
                                    <span class="time">
                                        <i class="fa fa-clock-o"></i> <?php echo Date('H.i.s', strtotime($events->DatePosted)); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                } else {
                    ?>
                    <div class="row">
                        <div class=" col-md-12">
                            <?php echo Yii::$app->params['static_items']['no_details'][Yii::$app->language]; ?>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>

                <?php if (isset($page_content['quick_links']) && $page_content['quick_links']): ?>
                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title"> <?php echo Yii::$app->params['static_items']['quick_links'][Yii::$app->language]; ?></h3>
                    </div>
                    <div id="sidebar" class="sidebar">
                        <div class="widget">

                            <div id="MainMenu">
                                <div class="list-group panel">
                                    <?php
                                    foreach ($page_content['quick_links'] as $quick_link) {
                                        ?>
                                        <a href="<?php echo app\components\Utilities::generateUrl($quick_link->LinkUrl); ?>" class="list-group-item main-item"><?php echo (Yii::$app->language == 'sw') ? $quick_link->ItemNameSw : $quick_link->ItemNameEn ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- page-list -->
                        </div>
                    </div>
                <?php endif; ?>

                <!--
                                <div class="section-title">
                                     Heading 
                                    <h3 class="title"> <?php //echo Yii::$app->params['static_items']['adacemic_units'][Yii::$app->language];           ?></h3>
                                </div>-->
                <!--
                
                                <div id="sidebar" class="sidebar">
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


            </div>

        </div>
    </div>

</section>

