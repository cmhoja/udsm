<!--HOME PAGE SLIDE SHOW AREA-->
<?php
echo $this->render('home_slide_show_area',['slideshowMenus'=>$home_content_slideshow_menus,'slideshows'=>$home_content_slideshow]);
?>
<!--END HOME SLIDE SHOW AREA-->

<!--CONTENT TOP AREA-->
<?php
echo $this->render('content_top_area', array('events' => $events, 'announcements' => $announcements, 'content_right_blocks' => $content_right_blocks));
?>
<!--END CONTENT TOP AREA-->

<!--MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA-->
<?php
echo $this->render('main_template_content_homepage_news_area', array('news' => $news));
?>
<!--END MAIN_TEMPLATE_CONTENT_HOMEPAGE_NEWS_AREA-->


<!-- CONTENT HOME PAGE BOTTOM-->
<?php
echo $this->render('content_home_page_bottom_area', ['content_home_page_bottom_area_menu' => $content_home_page_bottom_area_menu, 'videos' => $videos]);
?>
<!--END CONTENT HOME PAGE BOTTOM-->

<!--CONTENT BOTTOM AREA-->
<?php
echo $this->render('content_bottom_area', array('content_bottom_column1' => $content_bottom_column1, 'content_bottom_column2' => $content_bottom_column2, 'content_bottom_column3' => $content_bottom_column3, 'content_bottom_column4' => $content_bottom_column4));
?>
<!--END CONTENT BOTTOM AREA-->

<!--PROMOTION AREA  START HERE-->
<?php
echo $this->render('//site/home/promotion_area', ['content_footer_top_area' => $content_footer_top_area]);
?>
<!--END PROMOTIONAL AREA-->