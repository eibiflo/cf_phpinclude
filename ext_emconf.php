<?php

$EM_CONF["cf_phpinclude"] = [
    'title' => 'cf_phpinclude',
    'description' => 'Includes a Custom PHP Script in Typo3 Context',
    'category' => 'plugin',
    'author' => 'Florian Eibisbegrer',
    'author_email' => 'cookiemanager@coding-freaks.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-13.5.99',
            'list-type-migration' => '1.0',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
