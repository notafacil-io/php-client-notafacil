<?php
/**
 * File responsible for returning the basic data for the configuration of the package.
 */
return [
    'base_url'  => 'https://api.notafacil.io',
    'endpoint' => [
        'autenticacao' => [
            'login' => '/v1/auth/login',
            'logout' => '/v1/auth/logout'
        ],
        'softhouse' => [
            'logada' => '/v1/softhouse/logada',
            'atualizar' => '/v1/softhouse/atualizar'
        ]
    ],
];