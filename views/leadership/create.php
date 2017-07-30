<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Leadership */

$this->title = 'Create Leadership';
$this->params['breadcrumbs'][] = ['label' => 'Leaderships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leadership-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
