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

<div class="search" style="width: 90%">
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
            'UnitNameSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in Swahili'],
                'columnOptions' => ['width' => '185px']
            ],
            'UnitType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement'=> AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
        ]
    ]);
    echo Html::submitButton('Search', ['class' => 'btn btn-primary']);
    ActiveForm::end()
    ?>


</div>
