<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Announcement */

$this->title = 'Create Announcement';
$this->params['breadcrumbs'][] = ['label' => 'Manage Announcements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="announcement-create">

   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
