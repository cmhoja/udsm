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
        <title><?= Html::encode("UDSM Website| CMS") ?></title>
        <!--<title><?= Html::encode($this->title) ?></title>-->
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
                        <img style="height: 55px;position: relative; float: none;padding: 1%;"src="<?php echo Yii::getAlias('@web') . '/images/logo-udsm.png'; ?>" />
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
                    <p style="text-orientation: inherit;text-transform: uppercase;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: 300;position: relative; float: left; margin: 0; margin-left: 5%; color: white; font-size: 17px;display: block; padding: 1%; text-align: center;vertical-align: middle">
                        <b>Website Content Management System (CMS)</b>
                    </p>
                    <div class="navbar-custom-menu">
                        <div></div>
                        <ul class="nav navbar-nav" >
                            <?php
                            if (Yii::$app->user->isGuest) {
                                echo '<li><a href="' . Url::to(['/site/login']) . '">Login</a></li>';
                            } else {
                                echo '<li><a href="' . Url::to(['/site/logout']) . '">Logout (Loged in as: ' . Yii::$app->user->identity->username . ')</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            echo $this->render('//layouts/cms_main_menu');
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content" style="height: auto;min-height:500px">
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
                <strong>Copyright &copy; <?= Date('Y') ?> &nbsp;&nbsp;<a href="#">University of Dar es salaam (UDSM)</a>.</strong>
                All rights reserved.          
            </footer>   
        </div>  
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
