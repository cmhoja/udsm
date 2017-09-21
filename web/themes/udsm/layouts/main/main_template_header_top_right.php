 
<!--Getting All the Menu Items Allocated in this Region Dynamically-->
<?php
$top_right_menus = \app\models\MenuItem::getActiveMenuItemsByMenuTypeRegionAndTemplateByUnitID(\app\models\Menu::MENU_TYPE_OTHER_MENU, app\components\SiteRegions::MAIN_TEMPLATE_HEADER_TOP_RIGHT, NULL);
if ($top_right_menus) {
    foreach ($top_right_menus as $top_right_menu) {
        ?>
        <a  href="<?php echo app\components\Utilities::generateUrl($top_right_menu->LinkUrl) ?>">
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
        foreach ($supportedLanguages as $key => $language) {
            $key = \yii\helpers\Html::encode($key);
            switch ($key) {
                case 'en':
                    $flag = '/layouts/college/img/en.png';
                    break;

                case 'sw':
                    $flag = '/layouts/college/img/sw.png';
                    break;

                default :
                    $flag = '';
                    break;
            }

            if (\yii\helpers\Html::encode(Yii::$app->language) == $key) {
                ?>
                <a style="font-size: 0.75em" class = "hide" href = "<?php echo \app\components\Utilities::setLanguageLink($key); ?>">
                    <img src="<?php echo $this->theme->baseUrl . $flag; ?>">
                    <?php echo \yii\helpers\Html::encode($language); ?>
                </a>
                <?php
            } else {
                ?>
    <a  style="font-size: 0.75em" class ="active" href = "<?php echo \app\components\Utilities::setLanguageLink($key); ?>">
                    <img src="<?php echo $this->theme->baseUrl . $flag; ?>">
                    <?php echo \yii\helpers\Html::encode($language); ?>
                </a>
                <?php
            }
        }
    }
    ?>
</div>


