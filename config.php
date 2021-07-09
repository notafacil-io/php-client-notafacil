<?php
/**
 * File responsible for returning the basic data for the configuration of the package.
 */
return [
    'base_url'  => 'https://api.notafacil.io',
    'endpoint' => [
        'auth' => [
            'login' => '/v1/auth/login',
            'logout' => '/v1/auth/logout'
        ],
        'user' => [
            'register' => '/v1/usuario/salvar',
            'update' => '/v1/usuario/atualizar/:id',
            'delete' => '/v1/usuario/deletar/:id',
            'logged' => 'v1/usuario/logado',
            'listAll' => 'v1/usuario/todos',
            'byID' => 'v1/usuario/id/:id',
        ],
        'softhouse' => [
            'logada' => '/v1/softhouse/logada',
            'atualizar' => '/v1/softhouse/atualizar'
        ]
    ],
];