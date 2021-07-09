<?php

include_once(__DIR__.'/../../vendor/autoload.php');


use NotaFacil\Common\Services\AuthNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {
    
    $credentials = [
        'login' => '',
        'password' => '',
        'secret_key' => ''
    ];

    $clientNotaFacil =(new AuthNotaFacil())->attempt($credentials)
                       // ->getResponse();
                       ->getDataAuth();

    dump($clientNotaFacil);

} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}