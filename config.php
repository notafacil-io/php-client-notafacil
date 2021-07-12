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
            'config' => '/v1/empresa/config',
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
            'cnae' => '/v1/cnae'
        ],

        'customers' => [
            'register' => '/v1/cliente/salvar',
            'update' => '/v1/cliente/atualizar/:id',
            'listAll' => '/v1/cliente/todos',
            'byID' => '/v1/cliente/id/:id',
            'delete' => '/v1/cliente/deletar/:id',
            'additional' => [
                'address' => [
                    'register' => '/v1/cliente/:id/enderecos/salvar',
                    'update' => '/v1/cliente/:id_customer/enderecos/atualizar/:id_address',
                    'byID' => '/v1/cliente/:id_customer/enderecos/id/:id_address',
                    'listAll' => '/v1/cliente/:id_customer/enderecos/todos',
                    'delete' => '/v1/cliente/:id_customer/enderecos/deletar/:id_address',
                ],
                'telephone' => [
                    'register' => '/v1/cliente/:id/telefones/salvar',
                    'update' => '/v1/cliente/:id_customer/telefones/atualizar/:id_telephone',
                    'byID' => '/v1/cliente/:id_customer/telefones/id/:id_telephone',
                    'listAll' => '/v1/cliente/:id_customer/telefones/todos',
                    'delete' => '/v1/cliente/:id_customer/telefones/deletar/:id_telephone',
                ]
            ],

        ],

        'nfse' => [
            'register' => '/v1/nfse/salvar',
            'update' => '/v1/nfse/atualizar/:id',
            'delete' => 'v1/nfse/deletar/:id',

            'byID' => '/v1/nfse/id/:id',
            'listAll' => '/v1/nfse',

            'issue' => '/v1/nfse/emitir',
            'cancelIssue' => '/v1/nfse/cancelar',
            
            'consultRPS' => '/v1/nfse/consultarRps',
            'consultNFSe' => '/v1/nfse/consultarNfse',
            'consult' => '/v1/nfse/consultar',
            'consultCancellation' => '/v1/nfse/consultarCancelamento',

            'calculation' => '/v1/calculos/nfse-impostos',

            'parameters' => [
                'main' => [
                    'register' => '/v1/nfse/params/salvar',
                    'delete' => '/v1/nfse/params/deletar/:id',
                    'search' => '/v1/nfse/params/PROD',
                ],
                'services' => [
                    'register' => '/v1/nfse/servicoParams/salvar',
                    'update' => '/v1/nfse/servicoParams/atualizar/:id',
                    'delete' => '/v1/nfse/servicoParams/deletar/:id',

                    'byID' => '/v1/nfse/servicoParams/id/:id',
                    'listAll' => '/v1/nfse/servicoParams/todos',
                ],

            ]
        ],

        'softhouse' => [
            'logada' => '/v1/softhouse/logada',
            'atualizar' => '/v1/softhouse/atualizar'
        ]
    ],
];