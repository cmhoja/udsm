<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Announcement */

$this->title = 'Update Announcement: ';
$this->params['breadcrumbs'][] = ['label' => 'Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="announcement-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
