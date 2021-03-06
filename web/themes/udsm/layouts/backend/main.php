<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\LteAsset;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;

LteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?php //echo =Html::encode("UDSM Website| CMS")                 ?></title>
        <!--<title><?php //= Html::encode($this->title)                 ?></title>-->
        <?php $this->head() ?>
    </head>
    <!--    <body class="skin-blue sidebar-mini">-->
    <body class="skin-blue sidebar-mini">
        <?php $this->beginBody() ?>

        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo" style="height: auto">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <!--<span class="logo-mini"><b>UDSM</b> CMS</span>-->
                    <span class="logo-lg"> 
                        <img style="height: 55px;position: relative; float: none;padding: 1%;"src="<?php //echo Yii::getAlias('@web') . '/themes/udsm/layouts/backend/images/logo-udsm.png';                 ?>" />
                    </span>
                    <!-- logo for regular state and mobile devices -->
                 <!--<span class="logo-lg"><b>UDSM</b> CMS</span>-->
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu" style="width: 80%;margin-bottom: 0;">
                        <div style="float: left;width: 55%;margin: 0.2%;margin-top: 0.5%;">
                            <p style="text-orientation: inherit;text-transform: uppercase;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: 300;position: relative; float: left; color: white; font-size: 17px;display: block; padding: 0.2%;line-height: 18px; text-align: center;vertical-align: middle">
                                <b>Website Content Management System (CMS)</b>
                                <?php if (Yii::$app->session->has('UNIT_NAME')) { ?><br/>
                                    <span style="font-size: 10px; text-transform: uppercase">
                                        ---- &nbsp; &nbsp; <?php echo Yii::$app->session->get('UNIT_NAME'); ?>  &nbsp; &nbsp; ----
                                    </span>
                                <?php } ?>
                            </p>
                        </div>
                        <ul class="nav navbar-nav" style="float: right;font-size: 11px;">
                            <?php if (Yii::$app->user->isGuest && !Yii::$app->session->has('UID')) { ?>
                                <li><a href="<?php echo Url::to(['/backend/login']); ?>">Login</a></li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo Url::to(['/backend/logout']); ?>">(Logged in as: <?php echo Yii::$app->session->get('U_NAME'); ?>) >> Logout</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            if (!Yii::$app->user->isGuest OR ( Yii::$app->session->has('USER_TYPE_ADMINISTRATOR') OR Yii::$app->session->has('USER_TYPE_CONTENT_MANAGER'))) {
                echo $this->render('//layouts/backend/cms_main_menu');
            }
            ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="height: auto !important;">
                <!-- Main content -->
                <section class="content" style="height: auto !important;min-height:930px !important">
                    <?=
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>

                    <?= $content ?>
                </section>
            </div>

            <footer class="main-footer"  >
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.1
                </div>
                <strong>Copyright &copy; <?= Date('Y') ?> &nbsp;&nbsp;
                    <a href="http://www.udsm.ac.tz">University of Dar es salaam (UDSM)</a>.
                </strong>
                All rights reserved.          
            </footer>   
        </div>  
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
