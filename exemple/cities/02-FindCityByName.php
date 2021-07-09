<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\CitesNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentials = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];
    
    $citiesData = (new CitesNotaFacil($credentials))->findCityByName( 'São José dos pinhais' );

    dump($citiesData->getContent(), $citiesData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}