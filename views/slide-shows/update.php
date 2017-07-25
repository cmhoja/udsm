<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SlideShows */

$this->title = 'Update Slide Shows: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Slide Shows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slide-shows-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
