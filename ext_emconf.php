<?php

$EM_CONF["cf_phpinclude"] = [
    'title' => 'cf_phpinclude',
    'description' => 'Includes a Custom PHP Script in Typo3 Context',
    'category' => 'plugin',
    'author' => 'Florian Eibisbegrer',
    'author_email' => 'cookiemanager@coding-freaks.com',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.3',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-12.1.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
