<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgrammesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programmes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'ProgrammeNameEn') ?>

    <?= $form->field($model, 'ProgrammeNameSw') ?>

    <?= $form->field($model, 'ProgrammeUrl') ?>

    <?= $form->field($model, 'Duration') ?>

    <?php // echo $form->field($model, 'DescriptionEn') ?>

    <?php // echo $form->field($model, 'DescriptionSw') ?>

    <?php // echo $form->field($model, 'UnitID') ?>

    <?php // echo $form->field($model, 'EntryRequirements') ?>

    <?php // echo $form->field($model, 'ProgrammeType') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
