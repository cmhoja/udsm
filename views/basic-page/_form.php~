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
    <?= $form->errorSummary($model); ?>
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
//            'SectionLink' => [
//                'type' => Form::INPUT_DROPDOWN_LIST,
//                'options' => ['prompt' => '--- select --'],
//                'items' => \app\models\BasicPage::getSectionList(Yii::$app->session->get('UNIT_ID')),
//                'columnOptions' => ['width' => '185px', 'height' => '10px'],
//            ],
            'PageTitleEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the News in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'PageTitleSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the News in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'DescriptionEn' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],
            'DescriptionSw' => [
                'type' => Form::INPUT_WIDGET,
                'widgetClass' => \dosamigos\ckeditor\CKEditor::className(),
                'columnOptions' => ['rows' => 6, 'preset' => 'basic']
            ],'Photo' => [
                'type' => Form::INPUT_FILE,
                'columnOptions' => ['width' => '185px']
            ],
            'Attachment' => [
                'type' => Form::INPUT_FILE,
                'columnOptions' => ['width' => '185px']
            ],
            'EmbededVideo' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Video Embedding codes here to embed a video from youtube'],
                'columnOptions' => ['width' => '185px']
            ],
            'PageSeoUrl' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Url/Link to access this page','readonly'=>true],
                'columnOptions' => ['width' => '185px'],
                'visible' => (!$model->isNewRecord)
            ],
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>
</div>
