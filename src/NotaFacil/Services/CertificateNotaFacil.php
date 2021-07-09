<?php
namespace NotaFacil\Common\Services;

use NotaFacil\Common\Traits\RequestTrait;
use NotaFacil\Common\Resources\NotaFacilResource;
/**
 *  Class responsible for the authentication in the Nota Fácil API.
 */
class CertificateNotaFacil extends BaseService
{
    use RequestTrait;
                                                                                                                                                                                                               
    public function __construct(Array $credentialsNotaFacil)
    {
        parent::__construct();
        $this->credentialsNotaFacil = $credentialsNotaFacil;
    }
    
 
    
    public function listAll(): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->certificate->listAll );
    }

    public function showByID($idCertificate): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCertificate , $this->endpoint->certificate->byID) );
    }

    public function addCertificate($payload): NotaFacilResource
    {
        return $this->request( $this->base_url() . $this->endpoint->certificate->register, 'POST', $payload);
    }

  
    public function deleteCertificate($idCertificate): NotaFacilResource
    {
        return $this->request( $this->base_url() . str_replace(':id', $idCertificate , $this->endpoint->certificate->delete), 'DELETE');
    }

   
   

    

    

}
