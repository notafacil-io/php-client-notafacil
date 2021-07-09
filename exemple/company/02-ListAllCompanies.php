<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\CompanyNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentials = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];
    
    $companiesData = (new CompanyNotaFacil($credentials))->listAll();

    dump($companiesData->getContent(), $companiesData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}