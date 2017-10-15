<?php

/*
 * Use this file t manageme url/ routes in the application  
 */
return [
    'enablePrettyUrl' => TRUE,
    'showScriptName' => TRUE,
    'enableStrictParsing' => FALSE,
    'rules' => [
        ///STUDY MENUS REOUTES
        //colleges

        'colleges|college/<code>' => 'college/index',
        'colleges|college/<code>/<page>' => 'college/<page>',
        'colleges|college/<code>/<page>' => 'college/page',
        'colleges|college/<code>/<page>/<item>' => 'college/index',
        'colleges|college/<code>/<page>/<item>/<subitem>' => 'college/index',
        'colleges|college/<code>/<page>/<item>/<subitem>/<subitem2>' => 'college/index',
        //schools
        'schools|school/<code>' => 'schools/index',
        'schools|school/<code>/<page>' => 'schools/index',
        'schools|school/<code>/<page>/<item>' => 'schools/index',
        'schools|school/<code>/<page>/<item>/<subitem>' => 'schools/index',
        'schools|school/<code>/<page>/<item>/<subitem>/<subitem2>' => 'schools/index',
        //institutes
        'institutes|institute/<code>' => 'institutes/index',
        'institutes|institute/<code>/<page>' => 'institutes/index',
        'institutes|institute/<code>/<page>/<item>' => 'institutes/index',
        'institutes|institute/<code>/<page>/<item>/<subitem>' => 'institutes/index',
        'institutes|institute/<code>/<page>/<item>/<subitem>/<subitem2>' => 'institutes/index',
        //centers
        'centres|centre/<code>' => 'centres/index',
        'centres|centre/<code>/<page>' => 'centres/index',
        'centres|centre/<code>/<page>/<item>' => 'centres/index',
        'centres|centre/<code>/<page>/<item>/<subitem>' => 'centres/index',
        'centres|centre/<code>/<page>/<item>/<subitem>/<subitem2>' => 'centres/index',
        //////
        ///MAIN SITE
        'background|introduction' => 'about/index',
        'about|about-us|aboutus' => 'about/index',
        'about-us/leadership' => 'about/leadership',
        'about/leadership' => 'about/leadership',
        'about-us/annual-reports|about/annual-reports' => 'about/reports',
        'about/<category>' => 'about/index',
        'site/annual-reports' => 'about/reports',
        'site/student-corner|student-corner' => 'site/student-corner',
        'site/staff-corner|staff-corner' => 'site/staff-corner',
        //study routes
        'study/programme' => 'study/programme',
        'study/programme/<category>' => 'study/programme',
        'study/programmes' => 'study/programmes',
        'study/catalogue' => 'study/catalogue',
        'study/catalogue/<category>' => 'study/catalogue',
        'study/programmes/<category>' => 'study/programmes',
        'study/<category>/programmes' => 'study/programmes',
        'study|site/study' => 'study/index',
        'study/<category>' => 'study/index',
        ///research routes
        'research' => 'research/index',
        'research/project|research/projects' => 'research/projects',
        'research/policies|research/journals|research/books' => 'research/documents',
        'research/publications|research/publications/' => 'research/publications',
        'research/publications/<category>' => 'research/publications',
        'research/<category>' => 'research/index',
        ///public service routes
        'public-service' => 'public-service/index',
        'public-service/<category>' => 'public-service/index',
        ///public service routes
        'campus-life|site/campus-life' => 'campus-life/index',
        'campus-life/<category>' => 'campus-life/index',
        ///connects menus
        'connect/contact-us|site/contact-us' => 'site/contacts',
        'news-and-events|site/news-and-events|connect/news-and-events' => 'connect/news-and-events',
        'announcements|connect/announcements|site/announcements' => 'connect/announcements',
        'site/news|news|connect/news' => 'connect/news',
        'site/events|events|connect/events' => 'connect/events',
        'site/leadership' => 'about/leadership',
        'leadership' => 'about/leadership',
        //////
        ///BACKEND ROUTES
        'backend/templates' => 'backend/templates',
        'backend/<category>' => 'backend/<category>',
        'backend/logout' => 'backend/logout',
        'backend|login' => 'backend/login',
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
        'language|site/language|site/language/' => '/site/language',
        '<front>' => 'site/index',
        '/' => 'site/index',
    ///BACKEND
    ],
];
