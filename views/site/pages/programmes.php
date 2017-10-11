<?php
$this->title = Yii::$app->params['static_items']['programme'][Yii::$app->language];
?>
<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo Yii::$app->params['static_items']['programmes'][Yii::$app->language]; ?></h1>
            <ul class="breadcrumb">
                <li>
                    <a ><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?></a>
                </li>
                <li>
                    <a href="<?php echo app\components\Utilities::generateUrl('/study/') ?>"><?php echo Yii::$app->params['static_items']['study'][Yii::$app->language]; ?></a>
                </li>
                <li class="active"><?php echo Yii::$app->params['static_items']['programmes'][Yii::$app->language]; ?></li>
            </ul>
        </div>

    </div>
</div>

<section class="page-section">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <?php
                echo $this->render('_form_search_program')
                ?>
            </div>
            <div class="col-sm-12 col-md-12 pad-20">

                <?php
                if (Yii::$app->params['alphabets']) {
                    ?> 
                    <div class="course-list">
                        <h4><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['AZ_course_list']['sw'] : Yii::$app->params['static_items']['AZ_course_list']['en']; ?></h4>
                        <?php
                        $alphabets = Yii::$app->params['alphabets'];
                        if ($alphabets) {
                            ?>
                            <li style="font-size: 1.7em;"><a href="<?php echo app\components\Utilities::generateUrl('/study/catalogue'); ?>"><?php echo Yii::$app->params['static_items']['all'][Yii::$app->language]; ?></a> >> </li> 
                            <?php
                            foreach ($alphabets as $key => $value) {
                                ?>
                                <li style="font-size: 2em;">
                                    <a href="<?php echo app\components\Utilities::generateUrl('study/catalogue/' . html_entity_decode($value)); ?>"><?php echo $value; ?></a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($page_content) && $page_content) {
                    $count = 1;
                    ?>
                    <table class = "table">
                        <thead class = "programs">
                            <tr>
                                <th>#</th>
                                <th><?php echo Yii::$app->params['static_items']['programe_name'][Yii::$app->language]; ?></th>
                                <th><?php echo Yii::$app->params['static_items']['programe_type'][Yii::$app->language]; ?></th>
                                <th><?php echo Yii::$app->params['static_items']['programe_college_unit'][Yii::$app->language]; ?></th>
                                <th><?php echo Yii::$app->params['static_items']['programe_duration'][Yii::$app->language]; ?></th>
                                <th><?php echo Yii::$app->params['static_items']['programe_field_of_study'][Yii::$app->language]; ?></th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($page_content as $program) {
                            $programName = (Yii::$app->language == 'sw') ? $program->ProgrammeNameSw : $program->ProgrammeNameEn;
                            ?>
                            <tbody>
                                <tr><td><?php echo $count++; ?></td>
                                    <td><a href ="<?php echo \app\components\Utilities::generateUrl('/study/programme/' . html_entity_decode($program->ProgrammeUrl)); ?>"><?php echo $programName ?></a></td>
                                    <td><?php echo $program->getProgrammeTypeName(Yii::$app->language); ?></td>
                                    <td><?php echo \app\models\AcademicAdministrativeUnit::getUnitNameById($program->UnitID); ?></td>
                                    <td><?php echo (Yii::$app->language == 'sw') ? $program->DurationSw : $program->Duration; ?></td>
                                    <td><?php echo app\models\Programmes::getFieldOfStudyByValue($program->FieldOfStudy); ?></td>

                                </tr>
                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</section>


<!--request -->
