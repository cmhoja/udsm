<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BasicPageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search" style="width: 70%;">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'PageTitleEn') ?>


    <?php //echo $form->field($model, 'Status') ?>

    <?php //echo $form->field($model, 'UnitID') ?>
    <div style="margin-top: 5%">
        <?= Html::submitButton('Search', ['class' => 'btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
