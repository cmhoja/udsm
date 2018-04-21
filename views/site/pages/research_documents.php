
<?php
$title = Yii::$app->params['static_items']['research_document'][Yii::$app->language];
?>
<div class="page-header page-title-left">
    <div class="container">
        <div class="col-md-12 no-pad">
            <h1 class="title"><?php echo $title; ?> </h1>
            <ul class = "breadcrumb">
                <li>
                    <a href = "<?php echo yii\helpers\Url::home(); ?>"><?php echo Yii::$app->params['static_items']['home'][Yii::$app->language]; ?></a>
                </li>
                <li>
                    <a href = "#"><?php echo Yii::$app->params['static_items']['research'][Yii::$app->language]; ?></a>
                </li>
                <li class = "active"><?php echo $title; ?></li>
            </ul>
        </div>

    </div>
</div>



<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="pull-right col-sm-12 col-md-9">
                <?php if (isset($page_content) && $page_content) { ?>
                    <table class="table table-inverse">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo Yii::$app->params['static_items']['name'][Yii::$app->language]; ?></th>
                                <th><?php echo Yii::$app->params['static_items']['type'][Yii::$app->language]; ?></th>
                                <th><i class="fa fa-calendar"></i> <?php echo Yii::$app->params['static_items']['date'][Yii::$app->language]; ?></th>
                                <th><?php echo Yii::$app->params['static_items']['option'][Yii::$app->language]; ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($page_content as $content) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td>
                                        <?php echo (Yii::$app->language == 'sw') ? $content->DocumentNameSw : $content->DocumentNameEn ?>
                                    </td>

                                    <td><?php echo $content->getDocumentType(Yii::$app->language); ?></td>
                                    <td> 
                                        <?php echo Date('d.M.Y', strtotime($content->DatePublished)); ?>
                                    </td>
                                    <td><a download href="<?php echo \yii\helpers\HtmlPurifier::process(Yii::$app->getUrlManager()->getBaseUrl() . '/..' . Yii::$app->params['file_upload_main_site'] . '/' . $content->Attachment); ?>"  download><?php echo Yii::$app->params['static_items']['download'][Yii::$app->language]; ?></a>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger">
                        <?php
                        echo Yii::$app->params['static_items']['no_record'][Yii::$app->language];
                        ?>
                    </div><?php
                }
                ?>
            </div>

            <div id="sidebar" class="sidebar col-sm-12 col-md-3">
                <div class="widget">
                    <div class="widget-title">
                        <h3 class="title"> <?php echo Yii::$app->params['static_items']['other_pages'][Yii::$app->language]; ?></h3>
                    </div>
                    <div id="MainMenu">
                        <div class="list-group panel">
                            <?php
                            if (isset($side_menus) && $side_menus) {
                                foreach ($side_menus as $menu) {
                                    ?>
                                    <a href="<?php echo \app\components\Utilities::generateUrl($menu->LinkUrl); ?>" class="list-group-item main-item"><?php echo (Yii::$app->language === 'sw') ? $menu->ItemNameSw : $menu->ItemNameEn; ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- page-list -->
                </div>
            </div>
        </div> 
    </div>

</section>




