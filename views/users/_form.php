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
                'options' => ['placeholder' => 'Enter Last  Name'],
                'columnOptions' => ['width' => '185px']
            ],
            'UserName' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Enter User Name'],
                'columnOptions' => ['width' => '185px']
            ], 'Password' => [
                'type' => Form::INPUT_PASSWORD,
                'options' => ['placeholder' => 'Enter User Name'],
                'columnOptions' => ['width' => '185px']
            ],
            'UserType' => [
               'type' => Form::INPUT_DROPDOWN_LIST,
                'items' => Users::getUserTypes(), 'options' => ['prompt' => '-- Select --'],
                'columnOptions' => ['width' => '185px', 'height' => '10px']
            ],
        ]
    ]);
    echo Html::submitButton('save', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>


</div>
