<?php
return [
'jobs/<category:\w+>,<subcategory:\w+>/<state:\w+>,<city:\w+>/<page:\d>' => 'site/jobs',
'jobs/<category:\w+>,<subcategory:\w+>/<state:\w+>/<page:\d>' => 'site/jobs',
'jobs/<category:\w+>,<subcategory:\w+>/<page:\d>' => 'site/jobs',
'jobs/<category:\w+>/<state:\w+>,<city:\w+>/<page:\d>' => 'site/jobs',
'jobs/<category:\w+>/<state:\w+>/<page:\d>' => 'site/jobs',
'jobs/<category:\w+>/<page:\d>' => 'site/jobs',
'jobs/<category:\w+>,<subcategory:\w+>/<state:\w+>,<city:\w+>' => 'site/jobs',
'jobs/<category:\w+>,<subcategory:\w+>/<state:\w+>' => 'site/jobs',
'jobs/<category:\w+>,<subcategory:\w+>' => 'site/jobs',
'jobs/<category:\w+>/<state:\w+>,<city:\w+>' => 'site/jobs',
'jobs/<category:\w+>/<state:\w+>' => 'site/jobs',
'jobs/<category:\w+>' => 'site/jobs',
'jobs' => 'site/jobs',
];