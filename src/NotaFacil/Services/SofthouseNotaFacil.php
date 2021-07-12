<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\AuthNotaFacil;
use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Resources\NotaFacilResource;

/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class SofthouseNotaFacil
{
    use RequestTrait;
    public $clientNotaFacil;

    public function __construct(AuthNotaFacil $clientNotaFacil)
    {
        $this->clientNotaFacil = $clientNotaFacil;
    }

    public function showData(): NotaFacilResource
    {
        $urlRequest = $this->clientNotaFacil->base_url() . $this->clientNotaFacil->endpoint->softhouse->logada;
        return $this->request($urlRequest);
    }
    public function updateData($dataForUpdate): NotaFacilResource
    {
        $urlRequest = $this->clientNotaFacil->base_url() . $this->clientNotaFacil->endpoint->softhouse->atualizar;
        return $this->request($urlRequest, 'PUT', $dataForUpdate);
    }

    

}
