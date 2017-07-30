<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'FName') ?>

    <?= $form->field($model, 'LName') ?>

    <?= $form->field($model, 'Education') ?>

    <?= $form->field($model, 'Position') ?>

    <?php // echo $form->field($model, 'Summary') ?>

    <?php // echo $form->field($model, 'UnitID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
