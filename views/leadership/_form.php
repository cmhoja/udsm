<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
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
            'FName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter First Name'],
                'columnOptions' => ['width' => '185px']
            ],
            'LNames' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Last Names'],
                'columnOptions' => ['width' => '185px']
            ],
            'PositionEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Last Names'],
                'columnOptions' => ['width' => '185px']
            ],
            'PositionSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Last Names'],
                'columnOptions' => ['width' => '185px']
            ],
            'SummaryEn' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ], 'SummarySw' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],
            'ListOrder' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => app\components\Utilities::generateNumbers(30), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'Photo' => [
                'type' => Form::INPUT_FILE,
                'columnOptions' => ['width' => '185px']
            ],
            'LinkToPage' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Website link or page with more details or Office page for this person '],
                'columnOptions' => ['width' => '185px']
            ]
            
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>


