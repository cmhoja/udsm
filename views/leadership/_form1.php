<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Leadership */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leadership-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LNames')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PositionEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PositionSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SummaryEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SummarySw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ListOrder')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
