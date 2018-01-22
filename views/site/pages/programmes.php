<?php
$this->title = Yii::$app->params['static_items']['programme'][Yii::$app->language];
?>
<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo Yii::$app->params['static_items'][$program_type][Yii::$app->language]; ?></h1>
            <ul class="breadcrumb">
                <li>
                    <a ><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?></a>
                </li>
                <li>
                    <a href="<?php echo app\components\Utilities::generateUrl('/study/') ?>"><?php echo Yii::$app->params['static_items']['study'][Yii::$app->language]; ?></a>
                </li>
                <li class="active"><?php echo Yii::$app->params['static_items'][$program_type][Yii::$app->language]; ?></li>
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
                <!--DATA-->
                <?php
                echo yii\grid\GridView::widget([
                    'dataProvider' => $page_content,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => Yii::$app->language == 'sw' ? 'ProgrammeNameSw' : 'ProgrammeNameEn',
                            'label' => Yii::$app->params['static_items']['programe_name'][Yii::$app->language],
                            'value' => function ($model) {
                                return \yii\bootstrap\Html::a(Yii::$app->language == 'sw' ? $model->ProgrammeNameSw : $model->ProgrammeNameEn,\app\components\Utilities::generateUrl('/study/programme/' . html_entity_decode($model->ProgrammeUrl)));
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

            </div>
        </div>
    </div>
</section>


<!--request -->
