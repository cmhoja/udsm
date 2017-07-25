<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;
?>

<div class="search" style="clear: both; width: 90%">
    <?php
    $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]);
    ?><?php
    echo Form::widget([
        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [
            'UnitID' => [
                'type' => Form::INPUT_DROPDOWN_LIST,
                'options' => ['prompt' => '--- select --'],
                'items' => AcademicAdministrativeUnit::getUnitesInHirrach(['TypeContentManagement' => AcademicAdministrativeUnit::CONTENTMANAGEMENT_INTERNAL]),
                'columnOptions' => ['width' => '185px', 'height' => '10px'],
                'visible' => (Yii::$app->session->get('USER_TYPE_ADMINISTRATOR') && !Yii::$app->session->get('UNIT_ID')) ? TRUE : FALSE
            ], 'VideoNameEn' => [
                'type' => Form::INPUT_TEXT,
                'options' => ['placeholder' => 'Title of the Nes in English'],
                'columnOptions' => ['width' => '185px']
            ],
        ]
    ]);
    echo Html::submitButton('Search', ['class' => 'btn btn-primary']);
    ActiveForm::end();
    ?>

</div>
