<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'invisiblerecaptcha',
    'description' => 'Google invisible recaptcha TYPO3 extension for powermail',
    'category' => 'plugin',
    'version' => '7.0.0',
    'state' => 'stable',
    'author' => 'Powermail Development Team',
    'author_email' => 'alexander.kellner@in2code.de',
    'author_company' => 'in2code.de',
    'constraints' => [
        'depends' => [
            'powermail' => '11.0.0-1.99.99',
            'typo3' => '12.4.0-12.4.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];
