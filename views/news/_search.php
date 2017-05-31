<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'TitleEn') ?>

    <?= $form->field($model, 'TitleSw') ?>

    <?= $form->field($model, 'DetailsEn') ?>

    <?= $form->field($model, 'DetailsSw') ?>

    <?php // echo $form->field($model, 'Attachment') ?>

    <?php // echo $form->field($model, 'Photo') ?>

    <?php // echo $form->field($model, 'UnitID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
