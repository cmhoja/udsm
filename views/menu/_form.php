
<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;
use app\models\Menu;

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
//        'columns' => 2,
        'attributes' => [
            'MenuType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => Menu::getMenuTypes(), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'MenuName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'DisplayNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Diplay Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'DisplayNameSw' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Display Name in Swahili'],
                'columnOptions' => ['width' => '185px']
            ],
            'Description' => [
                'type' => Form::INPUT_TEXTAREA,
                'options' => ['placeholder' => 'Enter Unit Name in English'],
                'columnOptions' => ['width' => '185px']
            ],
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--Select Others(Default UDSM Main Website)--'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->has('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->has('UNIT_ID')) ? TRUE : FALSE
            ],
            'MenuCSSClass' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter CSS for this Menu Group'],
                'columnOptions' => ['width' => '185px']
            ],
            'MenuPlacementAreaRegion' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => \app\components\SiteRegions::getMainHomeTemplateMenuRegions(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
            ],
            'ShowOnPage' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter List of pages where this menu will be shown or Leave black for all pages'],
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
    echo Html::submitButton('save', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>

