<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\CitesNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentials = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];
    
    $companiesData = (new CitesNotaFacil($credentials))->citiesApproved();

    dump($companiesData->getContent(), $companiesData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}