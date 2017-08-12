 
<!--Getting All the Menu Items Allocated in this Region Dynamically-->
<?php
$top_right_menus = app\models\MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(\app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::MAIN_TEMPLATE_HEADER_TOP_RIGHT, NULL);
if ($top_right_menus) {
    foreach ($top_right_menus as $top_right_menu) {
        ?>
        <a target="" href="<?php echo yii\helpers\Url::to(array($top_right_menu->LinkUrl)) ?>">
            <?php echo html_entity_decode((Yii::$app->language == 'sw') ? $top_right_menu->ItemNameSw : $top_right_menu->ItemNameEn); ?>
        </a>
        <?php
    }
}
?>
<!--End Menu Retrieval-->

<!--Language selector Area-->
<div class = "custom-sel">
    <?php
///getting supported langauge
    $supportedLanguages = Yii::$app->params['supportedLanguages'];
    if (is_array($supportedLanguages)) {
//        var_dump($supportedLanguages);
        foreach ($supportedLanguages as $key => $language) {
            if (html_entity_decode(Yii::$app->language) == $key) {
                ?>
                <a class = "hidden" href = "#"><?php echo html_entity_decode($language); ?> &nbsp;
                    <i class = "fa fa-caret-down lightblue" aria-hidden = "true"></i>
                </a>
                <?php
            } else {
                ?>
                <a  class = "active" href = "#"><?php echo html_entity_decode($language); ?> &nbsp;
                 <i class = "fa fa-caret-down lightblue" aria-hidden = "true"></i>
               </a>
                <?php
            }
        }
    }
    ?>
</div>


