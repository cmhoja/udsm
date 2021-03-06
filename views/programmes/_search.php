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

<div class="search">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL,'method'=>'GET']);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'class' => 'search',
        'attributes' => [
            'onClick' => 'this.disabled=true;this.form.submit();',
            'ProgrammeType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => $model->getProgrameTypesList(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
            ],
            'ProgrammeNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the Program in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ],
        ]
    ]);
    echo Html::submitButton('Search', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>



