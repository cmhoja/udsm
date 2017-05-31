<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StaffList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Summary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
