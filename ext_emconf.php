<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Image Comparison Slider',
    'description' => 'Slider for showing the difference between two images',
    'category' => 'fe',
    'author' => 'MacGyer',
    'state' => 'stable',
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'fluid_styled_content' => '13.4.0-13.4.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
