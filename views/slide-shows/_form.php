<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\FileInput;
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
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getAcademicTopUnitsInHirrach(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ], 'TitleEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the News in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'TitleSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the News in Swahili'],
                'columnOptions' => ['width' => '185px']
            ], 'DetailsEn' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],
            'DetailsSw' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],
            'Upload' => [
                'type' => Form::INPUT_FILE,
            ],
            'LinkToPage' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Url to link this slide show to page'],
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);

//    echo '<label class="control-label">Add Photo</label>';
//    echo FileInput::widget([
//        'model' => $model,
//        'attribute' => 'Image[]',
//        'options' => ['multiple' => false, 'accept' => 'image/*', 'resizeImages' => true]
//    ]);

    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>


