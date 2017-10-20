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
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL, 'options' => ['enctype' => 'multipart/form-data']]);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'onClick' => 'this.disabled=true;this.form.submit();',
            'BlockName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockUnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ],
            'BlockType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => \app\models\CustomBlocks::getBlockTypes(),
                'columnOptions' => ['width' => '185px', 'height' => '10px', 'id' => 'BlockType'],
            ],
            'BlockPlacementAreaRegion' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => \app\components\SiteRegions::getCustomBlockPlacmentregions(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
            ],
            'BlockTitleEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block(will be shown in the Page'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockTitleSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block(will be shown in the Page'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockDetailsEn' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => ['placeholder' => 'Summary text content for information to be shown on the block'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockDetailsSw' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => ['placeholder' => 'Summary text content for information to be shown on the block'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'Upload' => [
                'type' => Form::INPUT_FILE,
                'options' => ['placeholder' => 'Block Photo to be shown on the page if any. Will be used insteady of video'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockIconCSSClass' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Fill here a specific Block Icon CSS Class for Formating'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockIconVideo' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Block Embeded Video Code to be shown if the block has no Picture Use this if There is no picture'],
                'columnOptions' => ['width' => '185px']
            ], 'ShowOnPage' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'List the Pages to show this block. Put Zero(0) for Home page, (*) for all pages and for multiple pages use a comma(,) separation list'],
                'columnOptions' => ['width' => '185px']
            ],
            'LinkToPage' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter url of the page or website that this block point when clicked'],
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>
</div>




