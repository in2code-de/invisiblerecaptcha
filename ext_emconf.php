<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'captchaeu',
    'description' => 'Captcha.eu TYPO3 extension for powermail',
    'category' => 'plugin',
    'version' => '1.0.2',
    'state' => 'stable',
    'author' => 'Captcha.eu',
    'author_email' => 'h.januschka@captcha.eu',
    'author_company' => 'captcha.eu',
    'constraints' => [
        'depends' => [
            'powermail' => '10.0.0-10.99.99',
            'typo3' => '10.0.0-11.5.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];
