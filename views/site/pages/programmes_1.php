<?php
$this->title = Yii::$app->params['static_items']['programme'][Yii::$app->language];
?>
<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo Yii::$app->params['static_items']['programme'][Yii::$app->language]; ?></h1>
            <ul class="breadcrumb">
                <li>
                    <a ><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?></a>
                </li>
                <li>
                    <a href="<?php echo app\components\Utilities::generateUrl('/study/') ?>"><?php echo Yii::$app->params['static_items']['study'][Yii::$app->language]; ?></a>
                </li>
                <li class="active"><?php echo Yii::$app->params['static_items']['programme'][Yii::$app->language]; ?></li>
            </ul>
        </div>

    </div>
</div>

<section class="page-section">
    <div class="container">
        <div class="row" >
            <div class="col-sm-12 col-md-12" style=";margin: 0 !important;">
                <?php
                echo $this->render('_form_search_program')
                ?>
            </div>
            <div class="col-sm-12 col-md-12 pad-20">

                <?php
                if (isset($page_content) && $page_content) {
                    $count = 0;
                    foreach ($page_content as $program) {
                        $programName = (Yii::$app->language == 'sw') ? $program->ProgrammeNameSw : $program->ProgrammeNameEn;
                        $FirstLater = strtoupper(substr($programName, 0, 1));
                        if ($count == 0) {
                            ?>
                            <br/>
                            <div class="courses" id="list1">
                                <?php
                            }

                            if ($count > 0 && (!empty($CurrentFirstLater) && $CurrentFirstLater != $FirstLater)) {
                                ?>
                                <hr>
                            </div>

                            <div class="courses" id="list1">
                                <?php
                            }
                            ?>
                            <a href="<?php echo \app\components\Utilities::generateUrl('/study/programme/' . html_entity_decode($program->ProgrammeUrl)); ?>"><?php echo $programName; ?></a>
                            <?php
                            $CurrentFirstLater = strtoupper(substr($programName, 0, 1));
                            $count++;
                        }
                        ?>
                        <hr>
                    </div>
                    <?php
                }
                ?>




            </div>
        </div>

    </div>
</section>



