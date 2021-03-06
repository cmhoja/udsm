<?php

$lang_constants = require(__DIR__ . '/lang_constants.php');
$field_of_study = require(__DIR__ . '/fields_of_study.php');

return [
    //defining the authentication type to be used. ldap=for ldap/ACtive Direcotry(AD) authentication, system=for system authentication
    'authType' => 'system', //ldap///this parameter defines the authentication system to be used to authenticte user of the system. only one of the two( ldap or system) authentication is require
    ///parameters for the ldap authenticatio system
    ///put this parameters only when ypu use ldap as authentication mechanism
    'LDap' => [
        'host' => 'https://ldap.udsm.ac.tz', ///ip address or qualified domain of the ldap server or active directory system
        'dn' => "cn=www,ou=services,dc=udsm,dc=ac,dc=tz", // values for the ldap dn section, The Base DN for the Directoty
        'domain' => 'udsm.ac.tz' ///domain for the purpose of constructing $username@domain
    ],
    'adminEmail' => 'admin@example.com',
    'file_upload_main_site' => '/upload',
    'file_upload_units_site' => '/upload',
    // 'language' => 'en',
    'supportedLanguages' => ['en' => 'English', 'sw' => 'Swahili'], //['en_US', 'ru_RU'],
    'static_items' => $lang_constants,
    'enable_language_change' => FALSE, //This config items allows or diables the user to change language TRUE=Enabled, FALSE=Disabled
    'field_of_study' => $field_of_study,
    'alphabets' => ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']
];
