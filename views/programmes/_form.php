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
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'onClick' => 'this.disabled=true;this.form.submit();',
            'ProgrammeType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => $model->getProgrameTypesList(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
            ],
            'FieldOfStudy' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => Yii::$app->params['field_of_study'],
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
            ],
            'ProgrammeNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the Program in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'ProgrammeNameSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the Program in Swahili'],
                'columnOptions' => ['width' => '185px']
            ],
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ], 'Duration' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Duration of the Pragrm'],
                'columnOptions' => ['width' => '185px']
            ], 'DescriptionEn' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'DescriptionSw' => [
                'type' => Form::INPUT_TEXTAREA,
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'EntryRequirements' => [
                'type' => Form::INPUT_TEXTAREA,
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>



