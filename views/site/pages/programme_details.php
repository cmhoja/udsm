
<?php
if (isset($page_content) && $page_content) {
    $title = Yii::$app->params['static_items']['programme_details'][Yii::$app->language];
    ?>
    <div class="page-header page-title-left">
        <div class="container">
            <div class="col-md-12 no-pad">
                <h1 class="title"><?php echo $title; ?> </h1>
                <ul class = "breadcrumb">
                    <li>
                        <a href = "<?php echo yii\helpers\Url::home(); ?>"><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?> </a>
                    </li>
                    <li>
                        <a href = "#"><?php echo Yii::$app->params['static_items']['programme'][Yii::$app->language]; ?></a>
                    </li>
                    <li class = "active"><?php echo $title; ?></li>
                </ul>
            </div>

        </div>
    </div>

    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h3 style="text-align: justify"><?php echo (Yii::$app->language == 'sw') ? $page_content->ProgrammeNameSw : $page_content->ProgrammeNameEn; ?></h3>
                    <div class="news-content">
                        <p >
                            <?php if ($page_content->ProgrammeType): ?>
                                <span ><strong><?php echo Yii::$app->params['static_items']['programme_type'][Yii::$app->language]; ?> : </strong></span>
                                <?php echo ($page_content->getProgrammeTypeName(Yii::$app->language)); ?>
                            <?php endif; ?>

                            <?php if ($page_content->Duration): ?>
                                <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['duration'][Yii::$app->language]; ?> : </strong></span>
                                <?php echo ((Yii::$app->language == 'sw') ? $page_content->DurationSw : $page_content->Duration); ?>
                            <?php endif; ?>

                            <?php if ($page_content->FieldOfStudy): ?>
                                <br/><br/> <span><strong><?php echo Yii::$app->params['static_items']['field_of_study'][Yii::$app->language]; ?> : </strong></span>
                                <?php echo (\app\components\Utilities::getFieldOfStudyNameByValue(Yii::$app->language, $page_content->FieldOfStudy)); ?>
                            <?php endif; ?>

                            <?php if ($page_content->UnitID): ?>
                                <span style="margin-left: 10%;"><strong><?php echo Yii::$app->params['static_items']['adacemic_unit'][Yii::$app->language]; ?> : </strong></span>
                                <?php echo (app\models\AcademicAdministrativeUnit::getUnitNameById($page_content->UnitID)); ?>
                            <?php endif; ?>
                        </p>

                        <p style="text-align: justify">
                            <?php echo (Yii::$app->language == 'sw') ? $page_content->DescriptionSw : $page_content->DescriptionEn; ?>
                        </p>	


                        <?php if ($page_content->EntryRequirements or $page_content->EntryRequirementsSw): ?>
                            <p style="text-align: justify">
                                <span>
                                    <strong><?php echo Yii::$app->params['static_items']['requirements'][Yii::$app->language]; ?></strong><br/>
                                    <?php echo (Yii::$app->language == 'sw') ? $page_content->EntryRequirementsSw : $page_content->EntryRequirements; ?>
                                </span>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

        </div> 

    </section>
<?php } else {
    ?>
    <section class="page-section">
        <div class="container">
            <div class="row" style="text-align: center">
                <?php
                echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                ?>
            </div>
        </div>
    </section>
    <?php
}
?>



