<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TitleEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TitleSw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DetailsEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DetailsSw')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Attachment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
