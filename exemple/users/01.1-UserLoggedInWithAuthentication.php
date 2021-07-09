<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\AuthNotaFacil;
use NotaFacil\Common\Services\UserNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;


try {
    $credentials = [
        'login' => 'ma_silva_softhouse',
        'password' => 'matheus_vhsys',
        'secret_key' => 'softhouse_vhsys'
    ];

    $clientNotaFacil = new AuthNotaFacil();
    $clientNotaFacil->setConsumerID('iUDo9xQ2XXFCEnSFxG7eQA==');
    
    $credentialsToken = $clientNotaFacil->attempt($credentials)->getDataAuth();

    $userData = (new UserNotaFacil($credentialsToken))->loggedData();

    dump($userData->getContent(), $userData->getStatusCode());

} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}