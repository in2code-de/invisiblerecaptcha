<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'invisiblerecaptcha',
    'description' => 'Google invisible recaptcha TYPO3 extension for powermail',
    'category' => 'plugin',
    'version' => '6.0.0',
    'state' => 'stable',
    'author' => 'Powermail Development Team',
    'author_email' => 'alexander.kellner@in2code.de',
    'author_company' => 'in2code.de',
    'constraints' => [
        'depends' => [
            'powermail' => '10.0.0-10.99.99',
            'typo3' => '11.0.0-11.5.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];
