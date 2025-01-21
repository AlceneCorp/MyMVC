<?php

return [
    'Test' => [
        'name' => [
            'value' => 'Test Module',
            'type' => 'text',
            'description' => 'Nom du module Test.',
            'readonly' => true
        ],
        'version' => [
            'value' => '1.0',
            'type' => 'text',
            'description' => 'Version actuelle du module Test.',
            'readonly' => true
        ],
        'active' => [
            'value' => false,
            'type' => 'boolean',
            'description' => 'Indique si le module Test est actif ou non.',
            'readonly' => false
        ]
    ]
];
