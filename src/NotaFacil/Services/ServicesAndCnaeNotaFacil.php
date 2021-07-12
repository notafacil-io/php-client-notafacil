<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Resources\NotaFacilResource;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class ServicesAndCnaeNotaFacil extends BaseService
{
    use RequestTrait;
                                                                                                                                                                                                               
    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }
    
    public function searchServices($search): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':search', $search , $this->endpoint->services->search) );
    }

    public function listCnae(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->services->cnae );
    }
    
   

}
