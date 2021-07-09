<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Resources\NotaFacilResource;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class CompanyNotaFacil extends BaseService
{
    use RequestTrait;
                                                                                                                                                                                                               
    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }
    
    public function loggedData(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->company->logged );
    }
    
    public function listAll(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->company->listAll );
    }

    public function showByID($idCompany): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCompany , $this->endpoint->company->byID) );
    }

    public function addCompany($payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->company->register, 'POST', $payload);
    }

    public function updateCompany($idCompany, $payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCompany , $this->endpoint->company->update), 'PUT', $payload);
    }
    
    public function deleteCompany($idCompany): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCompany , $this->endpoint->company->delete), 'DELETE');
    }

   
   

    

    

}
