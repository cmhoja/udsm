<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'MenuID') ?>

    <?= $form->field($model, 'ItemNameEn') ?>

    <?= $form->field($model, 'ItemNameSw') ?>

    <?= $form->field($model, 'LinkUrl') ?>

    <?php // echo $form->field($model, 'ParentItemID') ?>

    <?php // echo $form->field($model, 'LostOrder') ?>

    <?php // echo $form->field($model, 'SectionID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
