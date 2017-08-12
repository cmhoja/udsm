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
                    <a href = "<?php echo yii\helpers\Url::home(); ?>">Home</a>
                </li>
                <li>
                    <a href = "#"><?php echo Yii::$app->params['static_items']['staff_corner'][Yii::$app->language]; ?></a>
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
                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title"><?php echo Yii::$app->params['static_items']['staff_directory'][Yii::$app->language];  ?></h3>


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
                </form>



                <br>
                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title">Staff News</h3>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">

                        <div class="pull-left">
                            <img src="img/img1.jpg" alt="" title="" />
                        </div>


                    </div>

                    <div class="col-sm-8 col-md-8">
                        <h2 class="post-title">
                            <a href="news-details.html">News Title</a>
                        </h2>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 03.11.2014</span>
                        </div>

                        <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

                        <a href="news-details.html" class="btn btn-default btn-sm">Read More</a>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4 col-md-4">

                        <div class="pull-left">
                            <img src="img/img1.jpg" alt="" title="" />
                        </div>


                    </div>

                    <div class="col-sm-8 col-md-8">
                        <h2 class="post-title">
                            <a href="news-details.html">News Title</a>
                        </h2>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 03.11.2014</span>
                        </div>
                        <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

                        <a href="news-details.html" class="btn btn-default btn-sm">Read More</a>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4 col-md-4">

                        <div class="pull-left">
                            <img src="img/img1.jpg" alt="" title="" />
                        </div>


                    </div>

                    <div class="col-sm-8 col-md-8">
                        <h2 class="post-title">
                            <a href="news-details.html">News Title</a>
                        </h2>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 03.11.2014</span>
                        </div>
                        <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

                        <a href="news-details.html" class="btn btn-default btn-sm">Read More</a>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4 col-md-4">

                        <div class="pull-left">
                            <img src="img/img1.jpg" alt="" title="" />
                        </div>


                    </div>

                    <div class="col-sm-8 col-md-8">
                        <h2 class="post-title">
                            <a href="news-details.html">News Title</a>
                        </h2>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 03.11.2014</span>
                        </div>
                        <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

                        <a href="news-details.html" class="btn btn-default btn-sm">Read More</a>

                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4 col-md-4">

                        <div class="pull-left">
                            <img src="img/img1.jpg" alt="" title="" />
                        </div>


                    </div>

                    <div class="col-sm-8 col-md-8">
                        <h2 class="post-title">
                            <a href="news-details.html">News Title</a>
                        </h2>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 03.11.2014</span>
                        </div>
                        <div class="post-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

                        <a href="news-details.html" class="btn btn-default btn-sm">Read More</a>

                    </div>

                </div>
                <hr>

            </div>
            <div class="col-md-4 col-md-12">

                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title">Staff Announcements/ Notice Board</h3>

                </div>

                <li>
                    <a href="announcement-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur....</a>
                    <div class="post-meta">

                        <span class="time">
                            <i class="fa fa-calendar"></i> 13.01.2017</span>
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 14.00</span>
                    </div>
                </li>
                <hr>
                <li>
                    <a href="announcement-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur....</a>
                    <div class="post-meta">

                        <span class="time">
                            <i class="fa fa-calendar"></i> 13.01.2017</span>
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 14.00</span>
                    </div>
                </li>
                <hr>
                <li>
                    <a href="announcement-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur....</a>
                    <div class="post-meta">

                        <span class="time">
                            <i class="fa fa-calendar"></i> 13.01.2017</span>
                        <span class="time">
                            <i class="fa fa-clock-o"></i> 14.00</span>
                    </div>
                </li>
                <hr>



                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title">Upcoming Staff Events</h3>
                </div>
                <div class="row">
                    <div class=" col-md-12">
                        <h4><a href="event-details.html">Event Title</a></h4>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 13.01.2017</span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> 14.00 -16.00 </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class=" col-md-12">
                        <h4><a href="event-details.html"">Event Title</a></h4>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 13.01.2017</span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> 14.00 -16.00 </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class=" col-md-12">
                        <h4><a href="event-details.html"">Event Title</a></h4>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 13.01.2017</span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> 14.00 -16.00 </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class=" col-md-12">
                        <h4><a href="event-details.html"">Event Title</a></h4>
                        <div class="post-meta">

                            <span class="time">
                                <i class="fa fa-calendar"></i> 13.01.2017</span>
                            <span class="time">
                                <i class="fa fa-clock-o"></i> 14.00 -16.00 </span>
                        </div>
                    </div>
                </div>
                <hr>





                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title">Quick Links</h3>
                </div>




                <div id="sidebar" class="sidebar">
                    <div class="widget">

                        <div id="MainMenu">
                            <div class="list-group panel">



                                <a href="#" class="list-group-item main-item">Admin Mail</a>
                                <a href="#" class="list-group-item main-item">Staff Mail</a>
                                <a href="#" class="list-group-item main-item">ARIS</a>
                                <a href="#" class="list-group-item main-item">OPRAS</a>
                                <a href="#" class="list-group-item main-item">ICT Support Services</a>
                                <a href="#" class="list-group-item main-item">Timetable/Almanac</a>
                                <a href="#" class="list-group-item main-item">Staff Intranet</a>
                                <a href="#" class="list-group-item main-item">E-learning</a>
                                <a href="#" class="list-group-item main-item">UDSM Research Repository</a>
                                <a href="#" class="list-group-item main-item">iLab</a>
                                <a href="#" class="list-group-item main-item">Postgraduate Online Application</a>
                                <a href="#" class="list-group-item main-item">Alumni Portal</a>
                            </div>
                        </div>
                        <!-- page-list -->
                    </div>
                </div>



                <div class="section-title">
                    <!-- Heading -->
                    <h3 class="title">Academic Units</h3>
                </div>


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
                        <!-- page-list -->
                    </div>
                </div>


            </div>
        </div> 
    </div>

</section>

