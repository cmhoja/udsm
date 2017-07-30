<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResearchProjects */

$this->title = 'Update Projects: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Research Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="research-projects-update">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
