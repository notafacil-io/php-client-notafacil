<?php
include_once(__DIR__.'/../../vendor/autoload.php');

use NotaFacil\Common\Services\CertificateNotaFacil;
use NotaFacil\Common\Exceptions\NotaFacilException;

try {

    $credentials = [
        "consumer-id" => "",
        "token-bearer" => "Bearer "
    ];

    $payload = [
        "certificado_base64" => "",
        "certificado_senha" => "",
        "certificado_tipo" => ""
    ];
    
    $certificateData = (new CertificateNotaFacil($credentials))->addCertificate($payload);

    dump($certificateData->getContent(), $certificateData->getStatusCode());
      
} catch (NotaFacilException $th) {
    dump($th->getMessage(), $th->getCode());
}