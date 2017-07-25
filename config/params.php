<?php

$lang_constants = require(__DIR__ . '/lang_constants.php');
$field_of_study = require(__DIR__ . '/fields_of_study.php');

return [
    'adminEmail' => 'admin@example.com',
    'file_upload_main_site' => '/upload/main_site',
    'file_upload_units_site' => '/upload/units_site',
    'supportedLanguages' => ['en' => 'English', 'sw' => 'Swahili'], //['en_US', 'ru_RU'],
    'static_items' => $lang_constants,
    'field_of_study' => $field_of_study,
    'alphabets'=>['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
];
