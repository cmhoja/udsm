<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResearchProjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="research-projects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ProjectNameEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProjectNameSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitID')->textInput() ?>

    <?= $form->field($model, 'DetailsEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DetailsSw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OtherResearcher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Funding')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StartYear')->textInput() ?>

    <?= $form->field($model, 'EndYear')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
