<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResearchProjectsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-projects-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'ProjectNameEn') ?>

    <?= $form->field($model, 'ProjectNameSw') ?>

    <?= $form->field($model, 'UnitID') ?>

    <?= $form->field($model, 'DetailsEn') ?>

    <?php // echo $form->field($model, 'DetailsSw') ?>

    <?php // echo $form->field($model, 'Principal') ?>

    <?php // echo $form->field($model, 'OtherResearcher') ?>

    <?php // echo $form->field($model, 'Funding') ?>

    <?php // echo $form->field($model, 'StartYear') ?>

    <?php // echo $form->field($model, 'EndYear') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
