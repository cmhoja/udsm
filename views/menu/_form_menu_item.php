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
        'model' => $item_model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [
            'ItemNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'ItemNameSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'menuClasses' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ], 'LinkUrl' => [
                'type' => Form::INPUT_TEXT,
                'columnOptions' => ['width' => '185px', 'height' => '10px', 'placeholder' => 'Enter Destination Url for this Item when clicked']
            ],
            'UrlType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => app\models\MenuItem::getTargetUrlTypes(),
                'options' => ['prompt' => '-- select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'ParentItemID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => ArrayHelper::map(app\models\MenuItem::find()->where(['MenuID' => $item_model->MenuID])->orderBy('ParentItemID ASC')->all(), 'Id', 'ItemNameEn'),
                'options' => ['prompt' => '-- select--'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'ListOrder' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => app\components\Utilities::generateNumbers(30), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
        ]
    ]);
    echo Html::submitButton('save', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>




