<?php

/*
 * Use this file t manageme url/ routes in the application  
 */
return [
    'enablePrettyUrl' => TRUE,
    'showScriptName' => TRUE,
    'enableStrictParsing' => TRUE,
    'rules' => [
        ///about us routes
        'background|introduction' => 'about/index',
        'about|about-us|aboutus' => 'about/index',
        'about-us/leadership' => 'about/leadership',
        'about/leadership' => 'about/leadership',
        'about-us/annual-reports|about/annual-reports' => 'about/reports',
        'about/<category:\w+>' => 'about/index',
        'site/annual-reports' => 'about/reports',
        'site/student-corner|student-corner' => 'site/student-corner',
        'site/staff-corner|staff-corner' => 'site/staff-corner',
        //study routes
        'study/programmes' => 'study/programmes',
        'study/catalogue' => 'study/programmes',
        'study/programmes/<category:\w+>' => 'study/programmes',
        'study|site/study' => 'study/index',
        'study/<category:\w+>' => 'study/index',
        ///research routes
        'research|site/research' => 'research/index',
        'reseach/policies|research/journals|research|research/books' => 'reseach/documents',
        'research/<category:\w+>' => 'reseach/index',
        ///public service routes
        'public-service' => 'public-service/index',
        'public-service/<category:\w+>' => 'public-service/index',
        ///public service routes
        'campus-life|site/campus-life' => 'campus-life/index',
        'campus-life/<category:\w+>' => 'campus-life/index',
        ///connects menus
        'connect/contact-us|site/contact-us' => 'site/contacts',
        'news-and-events|site/news-and-events|connect/news-and-events' => 'connect/news-and-events',
        'announcements|connect/announcements|site/announcements' => 'connect/announcements',
        'site/news|news|connect/news' => 'connect/news',
        'site/events|events|connect/events' => 'connect/events',
        'site/leadership' => 'about/leadership',
        'leadership' => 'about/leadership',
        ///STUDY MENUS REOUTES
        'college/<category:\w+>' => 'college/index',
        'colleges/<category:\w+>' => 'college/index',
        'college/*' => 'college/index',
        'colleges/*' => 'college/index',
        // 'menu'=>'menu/index'
        //sitr default routes
        //backend rules
        'backend/logout' => 'backend/logout',
        'backend|login' => 'backend/login',
        'backend/<category>' => 'backend/<category>',
        'users/<category>' => 'users/<category>',
        'habari/<category>' => 'habari/<category>',
        'matukio/<category>' => 'matukio/<category>',
        'video/<category>' => 'video/<category>',
        'announcement/<category>' => 'announcement/<category>',
        'slide-shows/<category>' => 'slide-shows/<category>',
        'basic-page/<category>' => 'basic-page/<category>',
        'programmes/<category>' => 'programmes/<category>',
        'projects/<category>' => 'projects/<category>',
        'staff-list/<category>' => 'staff-list/<category>',
        'contacts/<category>' => 'contacts/<category>',
        'social-media-accounts/<category>' => 'social-media-accounts/<category>',
        'connect/social-media' => 'site/social-media',
        'contacts/<category>' => 'contacts/<category>',
        'menu/<category>' => 'menu/<category>',
        'custom-blocks/<category>' => 'custom-blocks/<category>',
        ///default route
        '<front>' => 'site/index',
        '/' => 'site/index',
    ///BACKEND
    ],
];
