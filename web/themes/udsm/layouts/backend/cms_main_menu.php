<?php

use yii\helpers\Url;

$session = Yii::$app->session;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            if ($session->has('USER_TYPE_ADMINISTRATOR') OR $session->has('USER_TYPE_CONTENT_MANAGER')) :
                ?>
                <li>
                    <a href="<?php echo Url::to(['/backend/index']) ?>">
                        <i class="fa fa-dashboard"></i> 
                        <span>Home</span>
                    </a>
                </li>
                <?php
                echo '<li><a href="' . Url::to(['/habari/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Manage News</span>'
                . '</a></li>';
                ?>
                <?php
                echo '<li><a href="' . Url::to(['/matukio/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Manage Events</span>'
                . '</a></li>';
                ?>
                <?php
                echo '<li><a href="' . Url::to(['/announcement/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Manage Announcement</span>'
                . '</a></li>';
                ?>

                <?php
                echo '<li><a href="' . Url::to(['/slide-shows/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Manage Home Slideshows</span>'
                . '</a></li>';
                ?>

                <?php
                if (!Yii::$app->session->has('UNIT_ID')) {
                    echo '<li><a href="' . Url::to(['/video/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                    . '<span>Manage Videos</span>'
                    . '</a></li>';
                }
                ?>

                <?php
                echo '<li><a href="' . Url::to(['/programmes/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Manage Programmes</span>'
                . '</a></li>';
                ?>
                <?php
                echo '<li><a href="' . Url::to(['/projects/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Research Projects</span>'
                . '</a></li>';
                ?>

                <?php
                echo '<li><a href="' . Url::to(['/staff-list/index']) . '">' . '<i class="fa fa-bar-chart"></i>'
                . '<span>Manage Staff</span>'
                . '</a></li>';
                ?>
            <?php endif; ?>

            <?php
            if ($session->has('USER_TYPE_ADMINISTRATOR')):
                ?>
                <?php
                echo '<li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Site Configurations</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="' . Url::to(['/contacts/index']) . '">
                                    <i class="fa fa-circle-o"></i>Manage Contacts</a>
                                 </li>
                                 <li><a href="' . Url::to(['/social-media-accounts/index']) . '">
                                    <i class="fa fa-circle-o"></i>Social Media Accounts</a>
                                 </li>
                                 <li><a href="' . Url::to(['/custom-blocks/index']) . '">
                                    <i class="fa fa-circle-o"></i> Custom Blocks</a>
                                 </li>
                                    <li><a href="' . Url::to(['/users/index']) . '">
                                    <i class="fa fa-circle-o"></i> Manage Users</a>
                                 </li>

                                <li><a href="' . Url::to(['/menu/index']) . '">
                                    <i class="fa fa-circle-o"></i> Configure Menu</a>
                                 </li>
                                 
                                <li><a href="' . Url::to(['/basic-page/index']) . '">
                                    <i class="fa fa-circle-o"></i> Manage Custom Page</a>
                                 </li>
                                 
                                 <li><a href="' . Url::to(['/academic-administrative-unit/index']) . '">
                                    <i class="fa fa-circle-o"></i>Academic/Administrative Units</a>
                                 </li>
                                 
                            </ul>
                        </li>';
                ?>

                <?php
                if (!$session->has('UNIT_ID')) {
                    echo '<li><a href="' . Url::to(['/logins/index']) . '">
                            <i class="fa fa-circle-o"></i> Login History</a>
                          </li> ';
                }
                ?>
            <?php endif;
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>