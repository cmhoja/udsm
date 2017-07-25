<a href="<?php echo app\models\MenuItem::generateUrl(html_entity_decode($menu->LinkUrl)); ?>">
        <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn); ?><span class="sub-arrow"></span>
    </a>

<div class="navbar-collapse collapse">
    <!-- nav -->
    <ul class="nav navbar-nav sm">
        <!-- Home  Mega Menu -->
        <li>
            <a href="<?php echo Yii::$app->homeUrl; ?>">Home<span class="sub-arrow">...</span></a>

        </li>




        <li class="mega-menu">
            <a href="#">About UDSM<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Background</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Mission & Vision</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="leadership.html"><h6 class="title">Leadership & Administration</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Annual Reports</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Message from Vice Chancellor</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Collaborations</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Corporate Social Responsibilities</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Facts & Figures</h6></a>

                        </div>

                    </div>

                </li>

            </ul>
        </li>

        <li class="mega-menu">
            <a href="#">Academic Unit<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">

                        <div class="col-md-15 col-sm-3">
                            <!-- Title -->
                            <a href="#"><h6 class="title">Constituent Colleges</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">DUCE</a>
                                </div>
                                <div>
                                    <a href="programmes.html">MUCE</a>
                                </div>


                            </div>

                        </div>
                        <div class="col-md-15 col-sm-3">
                            <!-- Title -->
                            <a href="#"><h6 class="title">Colleges</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">College 1</a>
                                </div>
                                <div>
                                    <a href="programmes.html">College 2</a>
                                </div>
                                <div>
                                    <a href="basic.html">College 3</a>
                                </div>

                            </div>

                        </div>



                        <div class="col-md-15 col-sm-3">
                            <!-- Title -->
                            <a href="#"><h6 class="title">Schools</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">School 1</a>
                                </div>
                                <div>
                                    <a href="programmes.html">School 2</a>
                                </div>
                                <div>
                                    <a href="basic.html">School 3</a>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-15 col-sm-3">
                            <!-- Title -->
                            <a href="#"><h6 class="title">Institutes</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">Institute 1</a>
                                </div>
                                <div>
                                    <a href="programmes.html">Institute 2</a>
                                </div>
                                <div>
                                    <a href="basic.html">Institute 3</a>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-15 col-sm-3">
                            <!-- Title -->
                            <a href="#"><h6 class="title">Centres</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">Centre 1</a>
                                </div>
                                <div>
                                    <a href="programmes.html">Centre 2</a>
                                </div>
                                <div>
                                    <a href="basic.html">Centre 3</a>
                                </div>

                            </div>

                        </div>


                    </div>

                </li>

            </ul>
        </li>




        <li class="mega-menu">
            <a href="#">Study<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Undergraduate</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">General Information</a>
                                </div>
                                <div>
                                    <a href="programmes.html">Programmes</a>
                                </div>
                                <div>
                                    <a href="basic.html">Admission Entry Requirements</a>
                                </div>

                            </div>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Postgraduate</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">General Information</a>
                                </div>
                                <div>
                                    <a href="programmes.html">Programmes</a>
                                </div>
                                <div>
                                    <a href="basic.html">Admission Entry Requirements</a>
                                </div>

                            </div>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">International Students</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Continuing Education</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Financial Aid & Scholarships</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Non-degree Programmes</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Others</h6></a>

                        </div>


                    </div>

                </li>

            </ul>
        </li>


        <li class="mega-menu">
            <a href="#">Research & Innovation<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Research</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">Our Research</a>
                                </div>
                                <div>
                                    <a href="basic.html">Research Policies & Guidelines</a>
                                </div>


                            </div>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Publications</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">Publications Policies & Guidelines</a>
                                </div>
                                <div>
                                    <a href="basic.html">Journals</a>
                                </div>

                                <div>
                                    <a href="basic.html">Books</a>
                                </div>


                            </div>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Research Labs & Centres</h6></a>


                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Research Repositories</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Research Chairs</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Intellectual Properties</h6></a>

                        </div>
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Conferences</h6></a>

                        </div>


                    </div>

                </li>

            </ul>
        </li>


        <li class="mega-menu">
            <a href="#">Public Service<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Consultancy</h6></a>
                            <div class="page-links">
                                <div>
                                    <a href="basic.html">Consultancy Bureaus</a>
                                </div>
                                <div>
                                    <a href="basic.html">Consultancy Policy &  Guidelines</a>
                                </div>

                                <div>
                                    <a href="basic.html">Other Consultancy Information</a>
                                </div>


                            </div>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Enterpreneurship</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Exhibitions</h6></a>

                        </div>


                    </div>

                </li>

            </ul>
        </li>


        <li class="mega-menu">
            <a href="#">Campus Life<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Religious Life / Chaplaincy</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Accomodation</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Student Organization</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Sports & Games</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Health Services</h6></a>

                        </div>


                    </div>

                </li>

            </ul>
        </li>


        <li class="mega-menu">
            <a href="basic.html">Convocation<span class="sub-arrow">...</span></a> 
        </li>
        <li class="mega-menu">
            <a href="basic.html">Alumni Portal<span class="sub-arrow">...</span></a> 
        </li>

        <li class="mega-menu">
            <a href="#">Connect<span class="sub-arrow">...</span></a> 

            <ul class="dropdown-menu">
                <li>
                    <div class="row">


                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="basic.html"><h6 class="title">Social Media</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="contact.html"><h6 class="title">Contact Us</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="news.html"><h6 class="title">News & Events</h6></a>

                        </div>

                        <div class="col-sm-3">
                            <!-- Title -->
                            <a href="announcements.html"><h6 class="title">Announcements</h6></a>

                        </div>


                    </div>

                </li>

            </ul>
        </li>



        <!-- Search Box Block -->
        <li class="search-dropdown">
            <a href="#">
                <span class="searchbox-icon">
                    <i class="fa fa-search"></i>
                </span>
            </a>
            <ul class="dropdown-menu left">
                <li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" value="" name="s" id="s" class="form-control" placeholder="search" />
                        </div>
                    </form>
                </li>
            </ul>
        </li>
        <!-- Ends Search Box Block -->
    </ul>
</div>