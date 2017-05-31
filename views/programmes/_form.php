<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Programmes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programmes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProgrammeNameEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProgrammeNameSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProgrammeUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescriptionEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DescriptionSw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'UnitID')->textInput() ?>

    <?= $form->field($model, 'EntryRequirements')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ProgrammeType')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
