<?php

/*
 * Use this file t manageme url/ routes in the application  
 */
return [
    'enablePrettyUrl' => TRUE,
    'showScriptName' => FALSE,
    'enableStrictParsing' => TRUE,
    'rules' => [
        ///about us routes
        //colleges
        'colleges|college/<category:\w+>/about-us' => 'college/index',
        'colleges|college/<category:\w+>/*'=>'college/index',
        'colleges|college/<category:\w+>' => 'college/index',
        'colleges|college/*'=>'college/index',
        ///MAIN SITE
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
        'study/programme' => 'study/programme',
        'study/programme/<category:\w+>' => 'study/programme',
        'study/programmes' => 'study/programmes',
        'study/catalogue' => 'study/catalogue',
        'study/catalogue/<category:\w+>' => 'study/catalogue',
        'study/programmes/<category:\w+>' => 'study/programmes',
        'study/<category:\w+>/programmes' => 'study/programmes',
        'study|site/study' => 'study/index',
        'study/<category:\w+>' => 'study/index',
        ///research routes
        'research' => 'research/index',
        'research/project|research/projects' => 'research/projects',
        'research/policies|research/journals|research/books' => 'research/documents',
        'research/publications|research/publications/' => 'research/publications',
        'research/publications/<category:\w+>' => 'research/publications',
        'research/<category:\w+>' => 'research/index',
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
        
        //schools
        'school/<category:\w+>' => 'schools/index',
        'schools/<category:\w+>' => 'schools/index',
        'school/*' => 'schools/index',
        'schools/*' => 'schools/index',
        //institutes
        'institute/<category:\w+>' => 'institutes/index',
        'institutes/<category:\w+>' => 'institutes/index',
        'institute/*' => 'institutes/index',
        'institutes/*' => 'institutes/index',
        //centers
        'centre/<category:\w+>' => 'centres/index',
        'centres/<category:\w+>' => 'centres/index',
        'centre/*' => 'centre/index',
        'centres/*' => 'centres/index',
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
