<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use app\models\AcademicAdministrativeUnit;
?>

<?php
echo \app\components\Utilities::createUrlString('study/programmes');

$model_search = new app\models\Programmes;
$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL, 'options' => ['method' => 'GET']]);
?>
<?php

echo Form::widget([
    'model' => $model_search,
    'form' => $form,
    'columns' => 1,
    'attributes' => [
       'PTYpe' => [
            'label' => '',
            'type' => Form::INPUT_DROPDOWN_LIST,
            'options' => ['prompt' => '--- ' . Yii::$app->params['static_items']['select_program_type'][Yii::$app->language] . ' --'],
            'items' => app\models\Programmes::getProgrameTypesList(Yii::$app->language),
            'columnOptions' => ['width' => '185px', 'height' => '10px','style'=>'margin-bottom: 0%;'],
        ],
        'FieldStudy' => [
            'label' => '',
            'type' => Form::INPUT_DROPDOWN_LIST,
            'options' => ['prompt' => '--- ' . Yii::$app->params['static_items']['select_field_of_study'][Yii::$app->language] . ' --'],
            'items' => \app\components\Utilities::getProgramFieldOfStudy(Yii::$app->language),
            'columnOptions' => ['width' => '185px', 'height' => '10px','style'=>'margin-bottom: 0%;'],
        ],
        'ProgrameName' => [
            'label' => '',
            'type' => Form::INPUT_TEXT,
            'options' => ['placeholder' => Yii::$app->params['static_items']['enter_key_word'][Yii::$app->language]],
            'columnOptions' => ['width' => '185px','style'=>'margin-bottom: 0%;']
        ]
    ]
]);
echo Html::submitButton('Search', ['value' => 'search', 'name' => 'search', 'class' => 'btn btn-success btn-block','submit'=>\app\components\Utilities::createUrlString('/study/programmes')]);
ActiveForm::end();
?>



