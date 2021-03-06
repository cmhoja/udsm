<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method'=>'GET'
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'ContactTitle') ?>

    <?= $form->field($model, 'PhoneNo') ?>

    <?= $form->field($model, 'FaxNo') ?>

    <?= $form->field($model, 'EmailAddress') ?>

    <?php // echo $form->field($model, 'GoogleMapCode') ?>

    <?php // echo $form->field($model, 'UnitID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
