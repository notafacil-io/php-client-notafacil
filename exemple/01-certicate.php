<?php

include_once(__DIR__.'/../vendor/autoload.php');

use NotaFacil\Client\Exceptions\NotaFacilException;


try {
    $credentials = [
        'login'      => 'NOME_USUARIO',
        'password'   => 'SENHA_USUARIO',
        'secret_key' => 'SECRET_KEY_SOFTHOUSE',
        
    ];
    

    $dataAuth = ( new \NotaFacil\Client\AuthNotaFacil() )->attempt($credentials);
   
   // $dataAuth->setConsumerID('PfRp5nxD5j4QjVnQY3Vd9Q==');

    $auth = $dataAuth->responseAuth();
    
    dump($dataAuth); // Retorna uma instancia da classe AuthClient
    
    dump($auth); // Recebe os dados do cliente do nota facil autenticado

} catch (NotaFacilException $th) {
    dump($th);
}