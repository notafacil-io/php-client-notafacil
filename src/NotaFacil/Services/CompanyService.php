<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class CompanyService extends BaseService
{
    use RequestTrait;
                                                                                                                                                                                                               
    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }
    
    public function loggedData(): array
    {
        return $this->request( $this->base_url() . $this->endpoint->company->logged );
    }
    
    public function listAll(): array
    {
        return $this->request( $this->base_url() . $this->endpoint->company->listAll );
    }

    public function showByID($idCompany): array
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCompany , $this->endpoint->company->byID) );
    }

    public function addCompany($payload): array
    {
        return $this->request( $this->base_url() . $this->endpoint->company->register, 'POST', $payload);
    }

    public function updateCompany($idCompany, $payload): array
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCompany , $this->endpoint->company->update), 'PUT', $payload);
    }
    
    public function deleteCompany($idCompany): array
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCompany , $this->endpoint->company->delete), 'DELETE');
    }

   
   

    

    

}
