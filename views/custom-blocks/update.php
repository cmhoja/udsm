<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CustomBlocks */

$this->title = 'Update Custom Blocks: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Custom Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custom-blocks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
