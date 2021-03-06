<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;
/////fck editor
use dosamigos\ckeditor\CKEditor;

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
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ], 'EventType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => \app\models\Events::getEventTypes(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ], 'EventTitleEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the News in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'EventTitleSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the News in Swahili'],
                'columnOptions' => ['width' => '185px']
            ],
            'DescriptionEn' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ], 'DescriptionSw' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],
            'StartDate' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => yii\jui\DatePicker::className(),
                'columnOptions' => ['dateFormat' => 'yyyy-MM-dd', 'todayHighlight' => true]
            ],
            'EndDate' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => yii\jui\DatePicker::className(),
                'pluginOptions' => [
                    'format' => 'yyyy-MM-dd',
                    'todayHighlight' => true
                ]
            ],
            'Attachment' => [
                'type' => Form::INPUT_FILE,
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>


