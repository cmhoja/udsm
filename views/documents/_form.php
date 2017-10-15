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
            'DocumentType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => \app\models\Documents::getDocumentTypes(),
                'columnOptions' => ['width' => '185px', 'height' => '10px', 'id' => 'BlockType'],
            ],
            'DocumentNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block'],
                'columnOptions' => ['width' => '185px']
            ],
            'DocumentNameSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block'],
                'columnOptions' => ['width' => '185px']
            ],
//            'UnitID' => [
//                'type' => Form::INPUT_DROPDOWN_LIST,
//                'options' => ['prompt' => '--- select --'],
//                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
//                'columnOptions' => ['width' => '185px', 'height' => '10px'],
//                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
//            ],
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





