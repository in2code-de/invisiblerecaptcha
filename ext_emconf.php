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
            'powermail' => '11.0.0-12.99.99',
            'typo3' => '12.4.0-12.4.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ]
];
