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
        //COLLEGES PAGES ROUTES
        'colleges/<code>/programmes' => 'college/programs',
        'colleges/<code>/programs' => 'college/programs',
        'colleges/<code>/program' => 'college/programs',
        'colleges/<code>/programmes/<item>' => 'college/programs',
        'colleges/<code>/programs/<item>' => 'college/programs',
        'colleges/<code>/program/<item>' => 'college/programs',
        'colleges/<code>/news/<item>' => 'college/news',
        'colleges/<code>/news' => 'college/news',
        'colleges/<code>/events/<item>' => 'college/events',
        'colleges/<code>/events' => 'college/events',
        'colleges/<code>/announcements' => 'college/announcements',
        'colleges/<code>/announcements/<item>' => 'college/announcements',
        'colleges/<code>/researchs/<item>' => 'college/researchs',
        'colleges/<code>/staff' => 'college/staff',
        'colleges|college/<code>' => 'college/index',
        //SCHOOLS PAGES ROUTES
        'schools/<code>/programmes' => 'schools/programs',
        'schools/<code>/programs' => 'schools/programs',
        'schools/<code>/program' => 'schools/programs',
        'schools/<code>/programmes/<item>' => 'schools/programs',
        'schools/<code>/programs/<item>' => 'schools/programs',
        'schools/<code>/program/<item>' => 'schools/programs',
        'schools/<code>/news/<item>' => 'schools/news',
        'schools/<code>/news' => 'schools/news',
        'schools/<code>/events/<item>' => 'schools/events',
        'schools/<code>/events' => 'schools/events',
        'schools/<code>/announcements' => 'schools/announcements',
        'schools/<code>/announcements/<item>' => 'schools/announcements',
        'schools|school/<code>' => 'schools/index',
        'schools|school/staff' => 'schools/staff',
        //INSTITUTES PAGES ROUTES
        'institutes/<code>/programmes' => 'institutes/programs',
        'institutes/<code>/programs' => 'institutes/programs',
        'institutes/<code>/program' => 'institutes/programs',
        'institutes/<code>/programmes/<item>' => 'institutes/programs',
        'institutes/<code>/programs/<item>' => 'institutes/programs',
        'institutes/<code>/program/<item>' => 'institutes/programs',
        'institutes/<code>/news/<item>' => 'institutes/news',
        'institutes/<code>/news' => 'institutes/news',
        'institutes/<code>/events/<item>' => 'institutes/events',
        'institutes/<code>/events' => 'institutes/events',
        'institutes/<code>/announcements' => 'institutes/announcements',
        'institutes/<code>/announcements/<item>' => 'institutes/announcements',
        'institutes|institute/<code>' => 'institutes/index',
        'institutes|institute/staff' => 'institutes/staff',
        //CENTRES PAGES ROUTES
        'centres/<code>/programmes' => 'centres/programs',
        'centres/<code>/programs' => 'centres/programs',
        'centres/<code>/program' => 'centres/programs',
        'centres/<code>/programmes/<item>' => 'centres/programs',
        'centres/<code>/programs/<item>' => 'centres/programs',
        'centres/<code>/program/<item>' => 'centres/programs',
        'centres/<code>/news/<item>' => 'centres/news',
        'centres/<code>/news' => 'centres/news',
        'centres/<code>/events/<item>' => 'centres/events',
        'centres/<code>/events' => 'centres/events',
        'centres/<code>/announcements' => 'centres/announcements',
        'centres/<code>/announcements/<item>' => 'centres/announcements',
        'centres|centre/<code>' => 'centres/index',
        'centres|centre/staff' => 'centres/staff',
        'centres|centre/staff' => 'centres/staff',
        //DIRECTORATES PAGES ROUTES
        'directorate/<code>/programmes' => 'directorate/programs',
        'directorate/<code>/programs' => 'directorate/programs',
        'directorate/<code>/program' => 'directorate/programs',
        'directorate/<code>/programmes/<item>' => 'directorate/programs',
        'directorate/<code>/programs/<item>' => 'directorate/programs',
        'directorate/<code>/program/<item>' => 'directorate/programs',
        'directorate/<code>/news/<item>' => 'directorate/news',
        'directorate/<code>/news' => 'directorate/news',
        'directorate/<code>/events/<item>' => 'directorate/events',
        'directorate/<code>/events' => 'directorate/events',
        'directorate/<code>/announcements' => 'directorate/announcements',
        'directorate/<code>/announcements/<item>' => 'directorate/announcements',
        'directorate/<code>/researchs/<item>' => 'directorate/researchs',
        'directorate/<code>/staff' => 'directorate/staff',
        'directorate/<code>' => 'directorate/index',
        //OFFICES PAGES ROUTES
        'office/<code>/programmes' => 'office/programs',
        'office/<code>/programs' => 'office/programs',
        'office/<code>/program' => 'office/programs',
        'office/<code>/programmes/<item>' => 'office/programs',
        'office/<code>/programs/<item>' => 'office/programs',
        'office/<code>/program/<item>' => 'office/programs',
        'office/<code>/news/<item>' => 'office/news',
        'office/<code>/news' => 'office/news',
        'office/<code>/events/<item>' => 'office/events',
        'office/<code>/events' => 'office/events',
        'office/<code>/announcements' => 'office/announcements',
        'office/<code>/announcements/<item>' => 'office/announcements',
        'office/<code>/researchs/<item>' => 'office/researchs',
        'office/<code>/staff' => 'office/staff',
        'office/<code>' => 'office/index',
        //////
        ///MAIN SITE ROUTES
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
        'directory/<code>' => 'site/directory',
        'directory' => 'site/directory',
        ///default route
        'language|site/language|site/language/' => '/site/language',
        '<front>' => 'site/index',
        'site/<code>' => 'site/page',
        'site/<page>' => 'site/page',
        //'site' => 'site/index',
        '/' => 'site/index',
    ///BACKEND
    ],
];
