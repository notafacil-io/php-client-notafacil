<?php

include_once(__DIR__.'/../vendor/autoload.php');

use NotaFacil\Client\ClientNotaFacil;
use NotaFacil\Client\Exceptions\NotaFacilException;


try {
    // $credentials = [
    //     'login'      => 'NOME_USUARIO',
    //     'password'   => 'SENHA_USUARIO',
    //     'secret_key' => 'SECRET_KEY_SOFTHOUSE',
    //     'consumer_id' => 'CONSUMER_ID_EMPRESA',
    // ];

    $dataAuth = new ClientNotaFacil();
    $credentials = $dataAuth->config['credentials-valid'];
    $dataAuth = $dataAuth->attempt($credentials);

    dump($dataAuth);
    
    // $dataAuth->setConsumerID($credentials['consumer_id']);

    

  
} catch (NotaFacilException $th) {
    dump($th);
}