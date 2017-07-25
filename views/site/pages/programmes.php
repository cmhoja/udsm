<?php
$this->title = 'Programmes';
?>
<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['programme']['sw'] : Yii::$app->params['static_items']['programme']['en']; ?></h1>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::$app->basePath; ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo app\components\Utilities::generateUrl('study/') ?>"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['study']['sw'] : Yii::$app->params['static_items']['study']['en']; ?></a>
                </li>
                <li class="active"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['programme']['sw'] : Yii::$app->params['static_items']['programme']['en']; ?></li>
            </ul>
        </div>

    </div>
</div>

<section class="page-section">
    <div class="container">
        <h4>Course Finder</h4>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <form class="form-inline" method="post" action="#">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['search_keyword']['sw'] : Yii::$app->params['static_items']['search_keyword']['en']; ?></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="exampleKeyword" name='Keyword' placeholder="<?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['search_keyword']['sw'] : Yii::$app->params['static_items']['search_keyword']['en']; ?>">
<!--                            <select class="form-control" name="FieldOFStudy">
                                <option value="">--select Programme Type--</option>
                            <?php
                            //$fieldOFStudy = Yii::$app->params['field_of_study'];
//                                if ($fieldOFStudy) {
//                                    foreach ($fieldOFStudy as $key => $field) {
//                                        
                            ?>
                                        <option value="//<?php //echo $key    ?>"><?php //echo $field[Yii::$app->language];    ?></option>
                                        //<?php
//                                    }
//                                }
                            ?>
                            </select>-->

                        </div>
                    </div>
                    <button type="submit" class="btn btn-default"><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['find_programme']['sw'] : Yii::$app->params['static_items']['find_programme']['en']; ?></button>
                </form>
            </div>

            <div class="col-sm-12 col-md-12 pad-20">
                <?php
                if (Yii::$app->params['alphabets']) {
                    ?> 
                    <div class="course-list">
                        <h4><?php echo (Yii::$app->language == 'sw') ? Yii::$app->params['static_items']['AZ_course_list']['sw'] : Yii::$app->params['static_items']['AZ_course_list']['en']; ?></h4>
                        <?php
                        $alphabets = Yii::$app->params['alphabets'];
                        foreach ($alphabets as $key => $value) {
                            ?>
                        <!--#list1-->
                            <li>
                                <a href="<?php echo $value; ?>"><?php echo $value; ?></a>
                            </li>
                            <?php }
                        ?>

                    </div>
                    <?php
                }
                ?>

                <!--          <div class="course-list">
          
                              <li>
                                  <a href="#list2">B</a>
                              </li>
                              <li>
                                  <a href="#">C</a>
                              </li>
                              <li>
                                  <a href="#">D</a>
                              </li>
                              <li class="no-course">
                                  <a href="#">E</a>
                              </li>
                              <li>
                                  <a href="#">F</a>
                              </li>
                              <li>
                                  <a href="#">G</a>
                              </li>
                              <li>
                                  <a href="#">H</a>
                              </li>
                              <li>
                                  <a href="#">I</a>
                              </li>
                              <li>
                                  <a href="#">J</a>
                              </li>
                              <li>
                                  <a href="#">K</a>
                              </li>
                              <li>
                                  <a href="#">L</a>
                              </li>
                              <li>
                                  <a href="#">M</a>
                              </li>
                              <li>
                                  <a href="#">N</a>
                              </li>
                              <li class="no-course">
                                  <a href="#">O</a>
                              </li>
                              <li>
                                  <a href="#">P</a>
                              </li>
                              <li>
                                  <a href="#">Q</a>
                              </li>
                              <li>
                                  <a href="#">R</a>
                              </li>
                              <li>
                                  <a href="#">S</a>
                              </li>
                              <li>
                                  <a href="#">T</a>
                              </li>
                              <li>
                                  <a href="#">V</a>
                              </li>
                              <li>
                                  <a href="#">W</a>
                              </li>
                              <li>
                                  <a href="#">X</a>
                              </li>
                              <li>
                                  <a href="#">Y</a>
                              </li>
                              <li>
                                  <a href="#">Z</a>
                              </li>
                          </div>-->


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
                            <a href="#"><?php echo $programName; ?></a>
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

                <!--
                                <div class="courses" id="list2">
                                    <a href="#">BCOM</a>
                                    <a href="#">Business Administration</a>
                
                                    <hr>
                                </div>-->


            </div>
        </div>

    </div>
</section>



