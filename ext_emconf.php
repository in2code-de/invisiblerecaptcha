<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'invisiblerecaptcha',
    'description' => 'Google invisible recaptcha TYPO3 extension for powermail',
    'category' => 'plugin',
    'version' => '5.1.1',
    'state' => 'stable',
    'author' => 'Powermail Development Team',
    'author_email' => 'alexander.kellner@in2code.de',
    'author_company' => 'in2code.de',
    'constraints' => [
        'depends' => [
            'powermail' => '8.0.0-8.99.99',
            'typo3' => '10.0.0-10.99.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];
