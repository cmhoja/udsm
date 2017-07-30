<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DocumentType')->textInput() ?>

    <?= $form->field($model, 'DocumentNameEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DocumentNameSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DatePublished')->textInput() ?>

    <?= $form->field($model, 'Attachment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitID')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
