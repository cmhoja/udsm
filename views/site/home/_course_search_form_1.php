<form role="form" name="contactform" id="contactform" method="POST" action="<?php echo \app\components\Utilities::generateUrl('/study/programmes'); ?>">

    <div class="input-text form-group">
        <select class="form-control" name="PTYpe" style="margin-bottom: 0%;">
            <option value=""> --- <?php echo Yii::$app->params['static_items']['select_program_type'][Yii::$app->language]; ?> ---</option>
            <option value="<?php echo \app\models\Programmes::PROGRAME_TYPE_UNDERGRADUATE; ?>"><?php echo Yii::$app->params['static_items']['undergraduate'][Yii::$app->language]; ?></option>
            <option value="<?php echo \app\models\Programmes::PROGRAME_TYPE_POSTUNDERGRADUATE; ?>"><?php echo Yii::$app->params['static_items']['postgraduate'][Yii::$app->language]; ?></option>
            <option value="<?php echo \app\models\Programmes::PROGRAME_TYPE_NON_DEGREE; ?>"><?php echo Yii::$app->params['static_items']['non_degree'][Yii::$app->language]; ?></option>
        </select>
    </div>
    <div class="input-text form-group">
        <select class="form-control" name="FieldStudy" style="margin-bottom: 0%;">
            <option value=""> --- <?php echo Yii::$app->params['static_items']['select_field_of_study'][Yii::$app->language]; ?> ---</option>
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
    <div class="input-text form-group">
        <input type="text" name="ProgrameName" style="margin-bottom: 0%;" class="input-name form-control" placeholder="<?php echo Yii::$app->params['static_items']['enter_key_word'][Yii::$app->language] ?>" />
    </div>

    <div class="course-search" style="margin-bottom: 4%;">
        <input type="submit" name='Search' value="<?php echo Yii::$app->params['static_items']['search'][Yii::$app->language]; ?>">
        <!--<button form="contactform" class="btn btn-success btn-block" type="submit"><i class="fa fa-search"></i>  <?php //echo Yii::$app->params['static_items']['search'][Yii::$app->language];  ?></button>-->
    </div>
</form>
