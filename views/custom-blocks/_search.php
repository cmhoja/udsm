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

<div class="search" style="width: 99%;">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL,'method'=>'GET']);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
          //  'onClick' => 'this.disabled=true;this.form.submit();',
            'BlockUnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ], 'BlockName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block'],
                'columnOptions' => ['width' => '185px']
            ],
            'BlockType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => \app\models\CustomBlocks::getBlockTypes(),
                'columnOptions' => ['width' => '185px', 'height' => '10px', 'id' => 'BlockType'],
            ],
            'BlockTitleEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Name of the Block(will be shown in the Page'],
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
     echo Html::submitButton('Search', ['class' => ' btn-primary']);
    ActiveForm::end();
    ?>
</div>
