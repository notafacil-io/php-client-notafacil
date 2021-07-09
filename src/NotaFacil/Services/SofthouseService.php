<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\ClientNotaFacil;
use NotaFacil\Common\Traits\RequestTrait;
use GuzzleHttp\Exception\ClientException;
use NotaFacil\Common\Exceptions\NotaFacilException;

/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class SofthouseService
{
    use RequestTrait;
    public $clientNotaFacil;

    public function __construct(ClientNotaFacil $clientNotaFacil)
    {
        $this->clientNotaFacil = $clientNotaFacil;
    }

    public function showData(): array
    {
        $urlRequest = $this->clientNotaFacil->base_url() . $this->clientNotaFacil->endpoint->softhouse->logada;
        return $this->request($urlRequest);
    }
    public function updateData($dataForUpdate): array
    {
        $urlRequest = $this->clientNotaFacil->base_url() . $this->clientNotaFacil->endpoint->softhouse->atualizar;
        return $this->request($urlRequest, 'PUT', $dataForUpdate);
    }

    

}
