<?php

use yii\helpers\Url;
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> 
                    <span>Home</span>
                </a>
            </li>
            <?php
            // if (Yii::$app->user->can('/news/index')) {
            echo '<li><a href="' . Url::to(['/news']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage News</span>'
            . '</a></li>';
            // }
            ?>
            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/events']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Events</span>'
            . '</a></li>';
            // }
            ?>
            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/announcement']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Announcement</span>'
            . '</a></li>';
            // }
            ?>

            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/slide-shows']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Home Slideshows</span>'
            . '</a></li>';
            // }
            ?>

            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/video']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Videos</span>'
            . '</a></li>';
            // }
            ?>

            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/programmes']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Programmes</span>'
            . '</a></li>';
            // }
            ?>
            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/research-projects']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Research Projects</span>'
            . '</a></li>';
            // }
            ?>

            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/basic-page']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Basic Page Contents</span>'
            . '</a></li>';
            // }
            ?>


            <?php
            // if (Yii::$app->user->can('/weather-data/index')) {
            echo '<li><a href="' . Url::to(['/staff-list']) . '">' . '<i class="fa fa-bar-chart"></i>'
            . '<span>Manage Staff</span>'
            . '</a></li>';
            // }
            ?>


            <?php
            // if (Yii::$app->user->can('Super Systems Admin')) {
            echo '<li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Site Configurations</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?r=contacts">
                                    <i class="fa fa-circle-o"></i>Manage Contacts</a>
                                 </li>
                                 <li><a href="index.php?r=social-media-accounts">
                                    <i class="fa fa-circle-o"></i>Social Media Accounts</a>
                                 </li>
                                 <li><a href="index.php?r=custom-blocks">
                                    <i class="fa fa-circle-o"></i> Custom Blocks</a>
                                 </li>
                                    <li><a href="index.php?r=users">
                                    <i class="fa fa-circle-o"></i> Manage Users</a>
                                 </li>

                                <li><a href="index.php?r=menu">
                                    <i class="fa fa-circle-o"></i> Configure Menu</a>
                                 </li>
                                 
                                 <li><a href="index.php?r=academic-administrative-unit">
                                    <i class="fa fa-circle-o"></i>Academic/Administrative Units</a>
                                 </li>
                                 
                            </ul>
                        </li>';
            //}
            ?>

            <?php
            // if (Yii::$app->user->can('Super Systems Admin')) {
            echo '<li class="treeview">
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span>Audit Logs</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?r=logins">
                                    <i class="fa fa-circle-o"></i> Login History</a>
                                 </li>

                                <li><a href="index.php?r=menu">
                                    <i class="fa fa-circle-o"></i> Activity History</a>
                                 </li>
                                 
                            </ul>
                        </li>';
            //}
            ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>