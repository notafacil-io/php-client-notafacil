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
            'logged' => '/v1/usuario/logado',
            'listAll' => '/v1/usuario/todos',
            'byID' => '/v1/usuario/id/:id',
        ],
        'company' => [
            'register' => '/v1/empresa/salvar',
            'update' => '/v1/empresa/atualizar/:id',
            'delete' => '/v1/empresa/deletar/:id',
            'logged' => '/v1/empresa/logada',
            'listAll' => '/v1/empresa/todos',
            'byID' => '/v1/empresa/id/:id',
        ],
        'certificate' => [
            'register' => '/v1/certificado/salvar',
            'delete' => '/v1/certificado/deletar//:id',
            'listAll' => '/v1/certificado/todos',
            'byID' => '/v1/certificado/id/:id',
        ],
        'cities' => [
            'listCities' => '/v1/cidade',
            'findCityByName' => '/v1/cidade?nome=:city_name',

            'listAllApproved' => '/v1/cidade/homologadas',
            'findApprovedByIBGE' => '/v1/cidade/homologadas?codigo_ibge=:code_ibge',
            
        ],
        'services' => [
            'search' => '/v1/servico?descricao=:search',
            
            'findCityByName' => '/v1/cidade?nome=:city_name',

            'listAllApproved' => '/v1/cidade/homologadas',
            'findApprovedByIBGE' => '/v1/cidade/homologadas?codigo_ibge=:code_ibge',
            
        ],
        'softhouse' => [
            'logada' => '/v1/softhouse/logada',
            'atualizar' => '/v1/softhouse/atualizar'
        ]
    ],
];