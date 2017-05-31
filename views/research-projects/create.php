<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ResearchProjects */

$this->title = 'Create Research Projects';
$this->params['breadcrumbs'][] = ['label' => 'Research Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="research-projects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
