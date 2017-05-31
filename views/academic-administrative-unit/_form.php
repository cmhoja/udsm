<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-administrative-unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UnitNameEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitNameSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitType')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
