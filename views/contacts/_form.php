<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;
?>

<div class="contacts-form">
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
            ], 'ContactTitle' => [
                'type' => Form::INPUT_TEXT,
               // 'options' => ['placeholder' => 'Unique name for Contacts Details name'],
                'columnOptions' => ['width' => '185px']
            ], 'ContactTitleSw' => [
                'type' => Form::INPUT_TEXT,
                //'options' => ['placeholder' => 'Unique name for Contacts Details name'],
                'columnOptions' => ['width' => '185px']
            ], 'Descriptions' => [
                'type' => Form::INPUT_TEXTAREA,
               // 'options' => ['placeholder' => 'Unique name for Contacts Details name'],
                'columnOptions' => ['width' => '185px']
            ],
            'DescriptionsSw' => [
                'type' => Form::INPUT_TEXTAREA,
                //'options' => ['placeholder' => 'Unique name for Contacts Details name'],
                'columnOptions' => ['width' => '185px']
            ],
            'PhoneNo' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Please use coma(,) for mutiple Phone numbers'],
                'columnOptions' => ['width' => '185px']
            ],
            'FaxNo' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Please use coma(,) for mutiple Fax numbers'],
                'columnOptions' => ['width' => '185px']
            ],
            'EmailAddress' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Please use coma(,) for mutiple Email addresses'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'PoBox' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Please use coma(,) for mutiple Fax numbers'],
                'columnOptions' => ['width' => '185px']
            ],
            'StreetRegion' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Please use coma(,) for mutiple Email addresses'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ], 'GoogleMapCode' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
    echo Html::submitButton('Save', ['value' => 'save', 'name' => 'save', 'class' => 'btn btn-primary']);
    echo Html::submitButton('Save & Publish', ['value' => 'publish', 'name' => 'publish', 'class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>



</div>
