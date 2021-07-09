<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Exceptions\NotaFacilException;
use NotaFacil\Common\Services\ServicesAndCnaeNotaFacil;

try {

    $credentials = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];
    
    $services = (new ServicesAndCnaeNotaFacil($credentials))->searchServices('tricão');

    dump($services->getContent(), $services->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}