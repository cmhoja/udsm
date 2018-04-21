<!--HOME CONTENT TOP LEFT & RIGHT-->
<?php
if (isset($no_details) && $no_details) {
    echo '<div id="page" style="min-height:200px">' . $no_details . '</div>';
} else {
    ?>
    <?php
    echo $this->render('home_slideshow_left_right', array('slideshow' => $home_content_slideshow, 'home_content_slideshow_right_menus' => $home_content_slideshow_right_menus, 'home_content_slideshow_right_blocks' => $home_content_slideshow_right_blocks));
    ?>

    <!--HOME CONTENT TOP COLUMN LEFT MIDDLE RIGHT-->
    <?php
    echo $this->render('home_content_top', array(
        'home_content_top_left_blocks' => $home_content_top_left_blocks,
        'home_content_top_left_menus' => $home_content_top_left_menus,
        'home_content_top_middle_announcements' => $home_content_top_middle_announcements,
        'home_content_top_right_menus' => $home_content_top_right_menus,
        'home_content_top_right_blocks' => $home_content_top_right_blocks
    ));
    ?>

    <!--HOME CONTENET MIDDLE AREA LEFT & RIGHT-->
    <?php
    echo $this->render('home_content_middle_left_right', array(
        'home_content_middle_left_news' => $home_content_middle_left_news,
        'home_content_middle_right_blocks' => $home_content_middle_right_blocks,
        'home_content_middle_right_menus' => $home_content_middle_right_menus
    ));
    ?>

    <!--HOME CONTENT EVENTS AREA-->
    <?php
    echo $this->render('home_content_events', array('home_content_events' => $home_content_events));
    ?>

    <!--HOME CONTENTS COLUMN1 TO 3-->
    <?php
    echo $this->render('home_content_bottom_column13', array(
        'home_content_bottom_column1_blocks' => $home_content_bottom_column1_blocks,
        'home_content_bottom_column1_menus'=>$home_content_bottom_column1_menus,
        'home_content_bottom_column2_blocks' => $home_content_bottom_column2_blocks,
        'home_content_bottom_column2_menus'=>$home_content_bottom_column2_menus,        
        'home_content_bottom_column3_blocks' => $home_content_bottom_column3_blocks,
        'home_content_bottom_column3_menus'=>$home_content_bottom_column3_menus
    ));
    ?>

<?php } ?>


