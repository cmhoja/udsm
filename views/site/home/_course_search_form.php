<form role="form" name="contactform" id="contactform" method="POST" action="<?php echo \app\components\Utilities::generateUrl('programs/search'); ?>">
    <div class="input-text form-group">
        <input type="text" name="Keyword" style="margin-bottom: 0%;" class="input-name form-control" placeholder="Enter Keyword" />
    </div>
    <div class="input-text form-group">
        <select class="form-control" name="ProgrammeType" style="margin-bottom: 0%;">
            <option value="">-- Programe Type --</option>
            <option value="<?php echo \app\models\Programmes::PROGRAME_TYPE_UNDERGRADUATE; ?>"><?php echo Yii::$app->params['static_items']['undergraduate'][Yii::$app->language]; ?></option>
            <option value="<?php echo \app\models\Programmes::PROGRAME_TYPE_POSTUNDERGRADUATE; ?>"><?php echo Yii::$app->params['static_items']['postgraduate'][Yii::$app->language]; ?></option>
            <option value="<?php echo \app\models\Programmes::PROGRAME_TYPE_NON_DEGREE; ?>"><?php echo Yii::$app->params['static_items']['non_degree'][Yii::$app->language]; ?></option>
        </select>
    </div>
    <div class="input-text form-group">
        <select class="form-control" name="FieldOfStudy" style="margin-bottom: 0%;">
            <option value=""> -- Field of Study --</option>
            <?php
            $FieldOfStudy = Yii::$app->params['field_of_study'];
            if (is_array($FieldOfStudy)) {

                foreach ($FieldOfStudy as $key => $field) {
                    ?>
                    <option value="<?php echo $key; ?>"><?php echo $field[Yii::$app->language]; ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <!--    <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Undergraduate
        </label>
        <label class="radio-inline">
            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Postgraduate
        </label>-->

    <div class="course-search" style="margin-bottom: 4%;">
        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-search"></i>  Search</button>
    </div>
</form>


<?php
//
//use yii\helpers\ArrayHelper;
//use yii\helpers\Html;
//use kartik\widgets\ActiveForm;
//use kartik\builder\Form;
//use app\models\AcademicAdministrativeUnit;
?>

<?php
//$model_search = new app\models\Programmes;
//$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);
?>
<?php
//echo Form::widget([
//    'model' => $model_search,
//    'form' => $form,
//    'columns' => 1,
//    'attributes' => [
//        'onClick' => 'this.disabled=true;this.form.submit();',
//        'ProgrameName' => [
//            'label' => '',
//            'type' => Form::INPUT_TEXT,
//            'options' => ['placeholder' => 'Ennter Key word'],
//            'columnOptions' => ['width' => '185px']
//        ],
//        'FieldOfStudy' => [
//            'label' => '',
//            'type' => Form::INPUT_DROPDOWN_LIST,
//            'options' => ['prompt' => '--- select --'],
//            'items' => Yii::$app->params['field_of_study'],
//            'columnOptions' => ['width' => '185px', 'height' => '10px'],
//        ],
//    ]
//]);
//echo Html::submitButton('Search', ['value' => 'search', 'name' => 'search', 'class' => 'btn btn-success btn-block']);
//ActiveForm::end();
?>



