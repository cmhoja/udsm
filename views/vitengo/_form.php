<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="add-form">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [
            'UnitNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'UnitNameSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in Swahili'],
                'columnOptions' => ['width' => '185px']
            ],  'UnitAbreviationCode' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Abbreviation Code'],
                'columnOptions' => ['width' => '185px']
            ], 
            'ParentUnitId' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(AcademicAdministrativeUnit::getParentUnitsList(), 'Id', 'UnitNameEn'),
                'options' => ['prompt' => '-- Please Choose Parent Unit (if any) --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'UnitType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => AcademicAdministrativeUnit::getUnitTypes(), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'TypeContentManagement' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => AcademicAdministrativeUnit::getContentMangementTypes(), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
        ]
    ]);
    echo Html::submitButton('save', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>

