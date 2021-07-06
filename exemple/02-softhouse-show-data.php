<?php

include_once(__DIR__.'/../vendor/autoload.php');

use NotaFacil\Client\SofthouseService;
use NotaFacil\Client\ClientNotaFacil;
use NotaFacil\Client\Exceptions\NotaFacilException;


try {
    
    $credentials = [
        'login'      => 'NOME_USUARIO',
        'password'   => 'SENHA_USUARIO',
        'secret_key' => 'SECRET_KEY_SOFTHOUSE',
        'consumer_id' => 'CONSUMER_ID_EMPRESA',
    ];
    
    $clientNotaFacil = (new ClientNotaFacil())->attempt($credentials);

    $softhouse = new SofthouseService($clientNotaFacil);
    $dataMySofthouse = $softhouse->showData();
    
  
} catch (NotaFacilException $th) {
    dump($th->getMessage());
}