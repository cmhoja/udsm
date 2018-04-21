<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicAdministrativeUnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search" style="width: 97%">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL, 'action' => ['index'],
                'method' => 'get',]);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [
            'UnitNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'ParentUnitId' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => \yii\helpers\ArrayHelper::map(AcademicAdministrativeUnit::getParentUnitsList(), 'Id', 'UnitNameEn'),
                'options' => ['prompt' => '-- select --','style'=>'width:185px;border:1px solid red;'],
                'columnOptions' => ['width' => '85px', 'height' => '10px']
            ],
            'UnitType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => AcademicAdministrativeUnit::getUnitTypes(), 
                'options' => ['prompt' => '-- Select --','style'=>'width:185px;border:1px solid red;float:left'],
                'columnOptions' => ['width' => '105px', 'height' => '10px']
            ],
//            'TypeContentManagement' => [
//                'type' => Form::INPUT_DROPDOWN_LIST,
//                'items' => AcademicAdministrativeUnit::getContentMangementTypes(), 
//                'options' => ['prompt' => '-- Select --'],
//                'columnOptions' => ['width' => '105px', 'height' => '10px']
//            ],
        ]
    ]);
    echo Html::submitButton('Search', ['class' => 'btn-primary']);
    ActiveForm::end()
    ?>


</div>
