<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'cf_phpinclude',
    'description' => 'Includes a Custom PHP Script in Typo3 Context',
    'category' => 'plugin',
    'author' => 'Florian Eibisbegrer',
    'author_email' => 'cookiemanager@coding-freaks.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
