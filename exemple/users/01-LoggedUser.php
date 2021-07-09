<?php
include_once(__DIR__.'/../../vendor/autoload.php');


use NotaFacil\Common\Services\UserNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;


try {

    $credentialsToken = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];

    $userData = (new UserNotaFacil($credentialsToken))->loggedData();

    dump($userData->getContent(), $userData->getStatusCode());

} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}