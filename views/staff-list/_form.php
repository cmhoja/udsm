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
        'columns' => 1,
        'attributes' => [
            'onClick' => 'this.disabled=true;this.form.submit();',
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ],
            'ListOrder' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => app\components\Utilities::generateNumbers(99), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'FName' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ], 'LName' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ],
            'Photo' => [
                'type' => Form::INPUT_FILE,
                'columnOptions' => ['width' => '185px']
            ],
            'Education' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ], 'EducationSw' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ],
            'Position' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ], 'PositionSw' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ],
            'Summary' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ], 'SummarySw' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>


