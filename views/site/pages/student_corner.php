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
                    <a href = "<?php echo yii\helpers\Url::home(); ?>">Home</a>
                </li>
                <li>
                    <a href = "#"><?php echo Yii::$app->params['static_items']['student_corner'][Yii::$app->language]; ?></a>
                </li>
                <li class = "active"><?php echo $title; ?></li>
            </ul>
        </div>

    </div>
</div>
<?php
if (!isset($page_content) && !$page_content) {
    ?>
    <section class="page-section">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-12 pull-right">
                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title">Education</h3>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <a href="#" ><img src="img/bottom.jpg"></a>
                            <h5><a href="#" class="promotions">Undergraduate</a></h5>
                            <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>
                        </div>

                        <div class="col-md-4">
                            <a href="#" ><img src="img/bottom.jpg"></a>
                            <h5><a href="#" class="promotions">Postgraduate</a></h5>
                            <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>
                        </div>

                        <div class="col-md-4">
                            <a href="#" ><img src="img/bottom.jpg"></a>
                            <h5><a href="#" class="promotions">International Students</a></h5>
                            <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>
                        </div>

                        <div class="col-md-4">
                            <a href="#" ><img src="img/bottom.jpg"></a>
                            <h5><a href="#" class="promotions">Continuing Education</a></h5>
                            <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#" ><img src="img/bottom.jpg"></a>
                            <h5><a href="#" class="promotions">Admission Requirements</a></h5>
                            <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#" ><img src="img/bottom.jpg"></a>
                            <h5><a href="#" class="promotions">Alumni</a></h5>
                            <p>Aenean sit amet nulla a massa vestibulum sagittis eleifend ut mi. Maecenas eget ex diam. Aenean sit amet venenatis lectus.</p>
                        </div>
                    </div>


                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title">Campus Life</h3>
                    </div>

                    <div class="row text-center top-pad-30">
                        <div class="col-sm-4 col-md-4">
                            <i class="fa fa-anchor medium text-color fa-2x icons-circle border-color"></i>
                            <a href="#"><h5>Life in Udsm</h5></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <i class="fa fa-home medium text-color fa-2x icons-circle border-color"></i>
                            <a href="#"><h5>Accomodation</h5></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <i class="fa fa-users medium text-color fa-2x icons-circle border-color"></i>
                            <a href="#"><h5>Student's Organization</h5></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <i class="fa fa-lightbulb-o medium text-color fa-2x icons-circle border-color"></i>
                            <a href="#"><h5>Religious Life</h5></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <i class="fa fa-trophy medium text-color fa-2x icons-circle border-color"></i>
                            <a href="#"><h5>Sports & Games</h5></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <i class="fa fa-medkit medium text-color fa-2x icons-circle border-color"></i>
                            <a href="#"><h5>Health & Services</h5></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus facilisis cvallis.</p>
                        </div>
                    </div>




                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title">News</h3>
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
                        <h3 class="title">Quick Links</h3>
                    </div>


                    <div id="sidebar" class="sidebar">
                        <div class="widget">

                            <div id="MainMenu">
                                <div class="list-group panel">



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
                        <h3 class="title">Upcoming Events</h3>
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

                    <div class="section-title">
                        <!-- Heading -->
                        <h3 class="title">Social Media</h3>

                    </div>


                    <div data-example-id="togglable-tabs" role="tabpanel" class="bs-example-tabs">
                        <ul role="tablist" class="nav nav-tabs" id="myTab">
                            <li class="active" role="presentation"><a aria-expanded="true" aria-controls="twitter" data-toggle="tab" role="tab" id="twitter-tab" href="#twitter"><i class= "fa fa-twitter"></i> Twitter</a></li>
                            <li role="presentation"><a aria-controls="facebook" data-toggle="tab" id="facebook-tab" role="tab" href="#facebook">
                                    <i class= "fa fa-facebook-square"></i> Facebook</a></li>

                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div aria-labelledby="twitter-tab" id="twitter" class="tab-pane fade in active" role="tabpanel">
                                <a class="twitter-timeline" data-height="700" href="https://twitter.com/UdsmAlumni">Tweets by UdsmAlumni</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                            <div aria-labelledby="facebook-tab" id="facebook" class="tab-pane fade" role="tabpanel">

                                <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FUniversity-Of-Dar-es-Salaam-126213247437175&width=370&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=700" scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:100%; height:700px; background: white; float:left; " allowtransparency="true"></iframe>

                            </div>

                        </div>
                    </div><!-- /example -->


                </div>
            </div> 
        </div>

    </section>



<?php } ?>




