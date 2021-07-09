<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\UserNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentialsToken = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];


    $payload = [
        "nome" => "Otávio Calebe Lucas Assunção",
        "cpf" => "551.334.528-53",
        "email" => "bunitinho3@tuamaeaquelaursa.com",
        "login" => "bunitinho03",
        "password" => "#S12341m",
        "skype" => "bunitinho03",
        "status" => true,
        "telefone" => [
            "ddd" => "41",
            "numero" => "995079453",
            "ramal" => "1",
            "tipo_telefone" => 1
        ],
        "role" => 1
    ];


    
    $userData = (new UserNotaFacil($credentials))->addUser($payload);

    dump($userData->getContent(), $userData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}