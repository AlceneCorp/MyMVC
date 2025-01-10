<?php

return
[
    'DATABASE' =>
    [
        'host' =>
        [
            'value' => 'HOST',
            'type' => 'text',
            'description' => 'L\'hôte du serveur de base de données (ex. : localhost, 127.0.0.1 ou une adresse IP externe)',
            'readonly' => true
        ],
        'username' =>
        [
            'value' => 'USERNAME',
            'type' => 'text',
            'description' => 'Nom d\'utilisateur pour se connecter à la base de données.',
            'readonly' => true
        ],
        'password' =>
        [
            'value' => 'PASSWORD',
            'type' => 'text',
            'description' => 'Mot de passe associé au nom d\'utilisateur pour accéder à la base de données.',
            'readonly' => true
        ],
        'dbname' =>
        [
            'value' => 'DBNAME',
            'type' => 'text',
            'description' => 'Nom de la base de données à utiliser pour la connexion.',
            'readonly' => true
        ],
        'charset' =>
        [
            'value' => 'utf8',
            'type' => 'text',
            'description' => 'Jeu de caractères à utiliser pour la connexion à la base de données. UTF-8 est recommandé.',
            'readonly' => true
        ]
    ]
];
