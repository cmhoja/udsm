<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\Users;
use app\models\AcademicAdministrativeUnit;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
    ?>
    <?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 2,
        'attributes' => [
            'UserType' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => Users::getUserTypes(), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ],
            'FName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter First Name'],
                'columnOptions' => ['width' => '185px']
            ],
            'LName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Last  Name(s)'],
                'columnOptions' => ['width' => '185px']
            ],
            'EmailAddress' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter Email Address'],
                'columnOptions' => ['width' => '185px']
            ],
            'UserName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter User Name'],
                'columnOptions' => ['width' => '185px']
            ],
            'Password' => [
                'type' => Form::INPUT_PASSWORD,
                'options' => ['placeholder' => 'Enter Password or Default password will be set'],
                'columnOptions' => ['width' => '185px'],
                'visible' => (isset(Yii::$app->params['authType']) && Yii::$app->params['authType'] != 'ldap') ? TRUE : FALSE
            ],
            'Status' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => Users::getUserStatuses(),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (!$model->isNewRecord) ? TRUE : FALSE
            ],
        ]
    ]);
    echo Html::submitButton('save', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>
