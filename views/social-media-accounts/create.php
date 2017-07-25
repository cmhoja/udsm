<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SocialMediaAccounts */

$this->title = 'Create Social Media Accounts';
$this->params['breadcrumbs'][] = ['label' => 'Social Media Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-media-accounts-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
