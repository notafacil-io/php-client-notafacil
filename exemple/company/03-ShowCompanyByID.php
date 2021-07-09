<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\CompanyNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentials = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];
    
    $companyData = (new CompanyNotaFacil($credentials))->showByID(2);

    dump($companyData->getContent(), $companyData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}