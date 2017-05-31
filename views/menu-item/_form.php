<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MenuID')->textInput() ?>

    <?= $form->field($model, 'ItemNameEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ItemNameSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LinkUrl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ParentItemID')->textInput() ?>

    <?= $form->field($model, 'LostOrder')->textInput() ?>

    <?= $form->field($model, 'SectionID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
