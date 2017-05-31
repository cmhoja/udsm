<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
?>

<?php

NavBar::begin([
    'brandLabel' => Yii::$app->params['SiteName'],
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => 'Logout',
            'url' => ['/site/logout'],
            'visible' => Yii::$app->user->id ? TRUE : FALSE
        ],
    ],
]);
NavBar::end();
?>
