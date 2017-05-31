<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ContactTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PhoneNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FaxNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmailAddress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GoogleMapCode')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'UnitID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
