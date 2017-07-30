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
            'onClick'=>'this.disabled=true;this.form.submit();',
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement'=> AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
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
            ],
            'DetailsEn' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'DetailsSw' => [
                'type' => Form::INPUT_TEXTAREA,
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ], 'Photo' => [
                'type' => Form::INPUT_FILE,
                'columnOptions' => ['width' => '185px']
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


