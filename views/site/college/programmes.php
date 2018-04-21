<?php
$this->title = Yii::$app->params['static_items']['programme'][Yii::$app->language];
?>

<section class="page-section">
    <?php
    //echo $content_side_menus;
    ?>
    <div class="container">
        <div class="row">
            <div class="pull-right col-sm-12 col-md-9">
                <h3 style="margin-bottom: 1%;margin-left: 2%"><?php echo Yii::$app->params['static_items']['programme'][Yii::$app->language]; ?></h3>

                <div class="col-sm-12 col-md-12" style="margin-top: 1%;margin-bottom: 1%;">
                    <?php
                    echo $this->render('_form_search_program')
                    ?>
                </div>
                <div class="col-sm-12 col-md-12 pad-20">
                    <?php
                    if (Yii::$app->params['alphabets']) {
                        ?> 
                        <div class="course-list" style="margin-bottom: 0;">
                            <h4> <?php echo Yii::$app->params['static_items']['AZ_course_list'][Yii::$app->language]; ?></h4>
                            <?php
                            $alphabets = Yii::$app->params['alphabets'];
                            if ($alphabets) {
                                ?>
                                <li style="font-size: 1.6em;"><a href="<?php echo app\components\Utilities::generateUrl('/colleges/' . $unit_details->UnitAbreviationCode . '/programmes'); ?>"><?php echo Yii::$app->params['static_items']['all'][Yii::$app->language]; ?></a> >> </li> 
                                <?php
                                foreach ($alphabets as $key => $value) {
                                    ?>
                                    <li>
                                        <a style="font-size: 0.5em;"href="<?php echo app\components\Utilities::generateUrl('/colleges/' . $unit_details->UnitAbreviationCode . '/programmes/' . html_entity_decode($value)); ?>"><?php echo $value; ?></a>
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
                        $count = 0;
                        ?>
                        <!--DATA-->
                        <?php
                        echo \yii\grid\GridView::widget([
                            'dataProvider' => $page_content,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'attribute' => Yii::$app->language == 'sw' ? 'ProgrammeNameSw' : 'ProgrammeNameEn',
                                    'label' => Yii::$app->params['static_items']['programe_name'][Yii::$app->language],
                                    'value' => function ($model) {
                                        return \yii\bootstrap\Html::a(Yii::$app->language == 'sw' ? $model->ProgrammeNameSw : $model->ProgrammeNameEn, \app\components\Utilities::generateUrl('colleges/' . \app\models\AcademicAdministrativeUnit::getUnitAbbreviationByID($model->UnitID) . '/programmes/' . html_entity_decode($model->ProgrammeUrl)));
                                    },
                                    'format' => 'html',
                                //'class' => ActionColumn::className(),
                                ],
                                [
                                    'attribute' => 'FieldOfStudy',
                                    'label' => Yii::$app->params['static_items']['programe_field_of_study'][Yii::$app->language],
                                    'value' => function ($model) {
                                        return app\models\Programmes::getFieldOfStudyByValue($model->FieldOfStudy);
                                    },
                                ],
                                [
                                    'attribute' => 'ProgrammeType',
                                    'label' => Yii::$app->params['static_items']['programe_type'][Yii::$app->language],
                                    'value' => function($model) {
                                        return $model->getProgrammeTypeName(Yii::$app->language);
                                    }
                                ],
                                [
                                    'attribute' => 'UnitID',
                                    'label' => Yii::$app->params['static_items']['programe_college_unit'][Yii::$app->language],
                                    'value' => function ($model) {
                                        return \app\models\AcademicAdministrativeUnit::getUnitNameById($model->UnitID);
                                    },
                                ],
                                [
                                    'attribute' => Yii::$app->language == 'sw' ? 'DurationSw' : 'Duration',
                                    'label' => Yii::$app->params['static_items']['programe_duration'][Yii::$app->language],
                                ]
                            ],
                        ]);
                        ?>
                        <?php
                    } else {
                        echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                    }
                    ?>
                </div>
            </div>


            <?php if (isset($side_menus) OR isset($side_blocks)) { ?>
                <div id="sidebar" class="sidebar col-sm-12 col-md-3">
                    <?php if (isset($side_menus) && $side_menus) {
                        ?>
                        <div class="widget">
                            <div class="widget-title">
                                <h3 class="title"> <?php echo Yii::$app->params['static_items']['other_pages'][Yii::$app->language]; ?></h3>
                            </div>
                            <div id="MainMenu">
                                <div class="list-group panel">
                                    <?php
                                    foreach ($side_menus as $menu) {
                                        ?>
                                        <a href="<?php echo \app\components\Utilities::generateUrl($menu->LinkUrl); ?>" class="list-group-item main-item"><?php echo (Yii::$app->language === 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn; ?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- page-list -->
                        </div>
                    <?php } ?>

                    <?php
                    if (isset($side_blocks) && $side_blocks) {
                        foreach ($side_blocks as $custom_block) {
                            ?>
                            <div class="text-left">
                                <!-- Title -->
                                <div class="section-title text-left">
                                    <!-- Heading -->
                                    <h2 class="title">
                                        <?php if (isset($custom_block->BlockIconCSSClass) && $custom_block->BlockIconCSSClass): ?>
                                            <i class="fa fa-graduation-cap"></i>
                                        <?php endif; ?>
                                        <?php echo (Yii::$app->language == 'sw') ? $custom_block->BlockTitleSw : $custom_block->BlockTitleEn; ?>
                                    </h2>

                                </div>
                                <?php if (isset($custom_block->BlockIconPicture) && $custom_block->BlockIconPicture): ?>
                                    <div style="padding: 2%;width: 95%">
                                        <img class="thumbnails" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $custom_block->BlockIconPicture; ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if (!$custom_block->BlockIconPicture && $custom_block->BlockIconVideo): ?>
                                    <div style="padding: 1%">
                                        <?php echo $custom_block->BlockIconVideo; ?>
                                    </div>
                                <?php endif; ?>

                                <p class="text-justify">
                                    <?php
                                    echo substr((Yii::$app->language == 'sw') ? $custom_block->BlockDetailsSw : $custom_block->BlockDetailsEn, 0, 250);
                                    ?>
                                </p>

                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>


<!--request -->
