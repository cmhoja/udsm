<?php

use yii\helpers\Url;

$session = Yii::$app->session;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
        if ((!Yii::$app->user->isGuest OR Yii::$app->session->has('UID')) && ($session->has('USER_TYPE_ADMINISTRATOR') OR $session->has('USER_TYPE_CONTENT_MANAGER'))) :
            ?>
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li>
                    <a href="<?php echo Url::to(['/backend/index']) ?>">
                        <i class="fa fa-dashboard"></i> 
                        <span>Home</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Url::to(['/habari/index']) ?>">
                        <i class="fa fa-bar-chart"></i> 
                        <span>Manage News</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Url::to(['/announcement/index']) ?>">
                        <i class="fa fa-bar-chart"></i> 
                        <span>Manage Announcement</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Url::to(['/matukio/index']) ?>">
                        <i class="fa fa-bar-chart"></i> 
                        <span>Manage Events</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo Url::to(['/slide-shows/index']) ?>">
                        <i class="fa fa-bar-chart"></i> 
                        <span>Manage Home Slideshows</span>
                    </a>
                </li>
                <!--FOR MAIN SITE ADMIN ONLY-->
                <?php if ($session->has('USER_TYPE_ADMINISTRATOR') && !$session->has('UNIT_ID')): ?>
                    <li>
                        <a href="<?php echo Url::to(['/video/index']) ?>">
                            <i class="fa fa-bar-chart"></i> 
                            <span>Manage Videos</span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--END MAIN SITE ADMIN-->

                <li>
                    <a href="<?php echo Url::to(['/programmes/index']) ?>">
                        <i class="fa fa-dashboard"></i> 
                        <span>Manage Programmes</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Url::to(['/projects/index']) ?>">
                        <i class="fa fa-bar-chart"></i> 
                        <span>Research Projects</span>
                    </a>
                </li>
                <!--UDSM MAIN CENTRAL ONLY-->
                <?php if (!$session->has('UNIT_ID')): ?>
                    <li>
                        <a href="<?php echo Url::to(['/documents/index']) ?>">
                            <i class="fa fa-bar-chart"></i> 
                            <span>Manage Documents</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!--END UDSM CENTRAL-->

                <li>
                    <a href="<?php echo Url::to(['/staff-list/index']) ?>">
                        <i class="fa fa-bar-chart"></i> 
                        <span>Manage Staff</span>
                    </a>
                </li>



                <!--FOR MAIN SITE ADMIN ONLY-->
                <?php if ($session->has('USER_TYPE_ADMINISTRATOR') && !$session->has('USER_TYPE_CONTENT_MANAGER')): ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>Site Configurations</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo Url::to(['/contacts/index']) ?>">
                                    <i class="fa fa-circle-o"></i>Manage Contacts</a>
                            </li>
                            <li><a href="<?php echo Url::to(['/social-media-accounts/index']) ?>">
                                    <i class="fa fa-circle-o"></i>Social Media Accounts</a>
                            </li>
                            <li><a href="<?php echo Url::to(['/custom-blocks/index']) ?>">
                                    <i class="fa fa-circle-o"></i> Manage Custom Blocks</a>
                            </li>
                            <li><a href="<?php echo Url::to(['/users/index']) ?>">
                                    <i class="fa fa-circle-o"></i> Manage Users</a>
                            </li>

                            <li><a href="<?php echo Url::to(['/menu/index']) ?>">
                                    <i class="fa fa-circle-o"></i> Configure/Manage Menu</a>
                            </li>

                            <li><a href="<?php echo Url::to(['/basic-page/index']) ?>">
                                    <i class="fa fa-circle-o"></i> Manage Custom Page</a>
                            </li>
                            <?php if ($session->has('USER_TYPE_ADMINISTRATOR') && !$session->has('UNIT_ID') && !$session->has('USER_TYPE_CONTENT_MANAGER')) { ?>

                                <li><a href="<?php echo Url::to(['/vitengo/index']) ?>">
                                        <i class="fa fa-circle-o"></i>Academic/Administrative Units</a>
                                </li>
                                <li>
                                    <a href="<?php echo Url::to(['/backend/templates', 'opt' => 'main']) ?>">
                                        <i class="fa fa-circle-o"></i>Main Website Regions</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo Url::to(['/backend/templates', 'opt' => 'units']) ?>">
                                    <i class="fa fa-circle-o"></i>Units Template Regions</a>
                            </li>
                            <li>
                                <a href="<?php echo Url::to(['/backend/templates', 'opt' => 'page']) ?>">
                                    <i class="fa fa-circle-o"></i>Custom Page Regions</a>
                            </li>
                        </ul>
                    </li>

                <?php endif; ?>

                <?php if ($session->has('USER_TYPE_ADMINISTRATOR') && !$session->has('UNIT_ID') && !$session->has('USER_TYPE_CONTENT_MANAGER')) { ?>
                    <li>
                        <a href="<?php echo Url::to(['/leadership/index']) ?>">
                            <i class="fa fa-bar-chart"></i> 
                            <span>UDSM Leadership/Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Url::to(['/logins/index']) ?>">
                            <i class="fa fa-circle-o"></i> 
                            <span>Login History</span>
                        </a>
                    </li>  
                <?php } ?>
            </ul>
        <?php endif; ?>
    </section>
    <!-- /.sidebar -->
</aside>